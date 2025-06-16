<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use App\Models\RedBlood;
use App\Models\Plasma;
use App\Models\Platelet;
use App\Models\Donor;
use App\Models\BadBlood;
use App\Models\BloodUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BankManagerController extends Controller {
    public function bloodInventory(Request $request) {
        $bloodType = $request->input('blood_type');
        $componentType = $request->input('component_type');

        $query = DB::table('red_bloods as r')
            ->select(
                'r.blood_type',
                'r.rhesus_factor',
                DB::raw('SUM(r.quantity) as red_count'),
                DB::raw('(SELECT SUM(p.quantity) FROM plasmas p WHERE p.blood_type = r.blood_type AND p.rhesus_factor = r.rhesus_factor) as plasma_count'),
                DB::raw('(SELECT SUM(pl.quantity) FROM platelets pl WHERE pl.blood_type = r.blood_type AND pl.rhesus_factor = r.rhesus_factor) as platelet_count')
            )
            ->groupBy('r.blood_type', 'r.rhesus_factor');

        if ($bloodType) {
            $query->where('r.blood_type', $bloodType);
        }

        $inventory = $query->get();

        return view('bank-manager.blood-inventory', compact('inventory', 'bloodType', 'componentType'));
}
    

    public function bloodRequests() {
        $requests = BloodRequest::where('status', 'pending')->get();
        return view('bank-manager.blood-requests', compact('requests'));
    }

    public function approveRequest($id)
    {
        $request = BloodRequest::findOrFail($id);

        $component = $request->blood_component;
        $bloodType = $request->blood_type;
        $rhesus = $request->rhesus_factor;
        $quantity = $request->quantity;
    
        // تحديد الجدول حسب نوع المكون
        $model = match ($component) {
            'Red Blood' => new \App\Models\RedBlood(),
            'Plasma' => new \App\Models\Plasma(),
            'Platelet' => new \App\Models\Platelet(),
            default => null,
        };
    
        if (!$model) {
            return redirect()->back()->with('error', 'Invalid component type.');
        }
    
        // حساب مجموع الكمية المتوفرة
        $totalAvailable = $model->where('blood_type', $bloodType)
            ->where('rhesus_factor', $rhesus)
            ->sum('quantity');
    
        if ($totalAvailable < $quantity) {
            return redirect()->back()->with('error', 'Insufficient quantity in inventory.');
        }
    
        // خصم الأكياس واحدة تلو الأخرى من السجلات حسب الكمية المطلوبة
        $units = $model->where('blood_type', $bloodType)
            ->where('rhesus_factor', $rhesus)
            ->orderBy('created_at') // لضمان FIFO
            ->get();
    
        $remaining = $quantity;
    
        foreach ($units as $unit) {
            if ($remaining <= 0) break;
    
            if ($unit->quantity <= $remaining) {
                $remaining -= $unit->quantity;
                $unit->delete(); // حذف الكيس بالكامل
            } else {
                $unit->quantity -= $remaining;
                $unit->save(); // خصم جزئي
                $remaining = 0;
            }
        }
    
        // تحديث حالة الطلب
        $request->status = 'approved';
        $request->save();
    
        return redirect()->back()->with('success', 'Request approved and blood units sent.');  
    }

    public function rejectRequest($id) {
        $request = BloodRequest::findOrFail($id);

        if ($request->status === 'pending') {
            $request->status = 'rejected';
            $request->save();
        }
    
        return redirect()->back()->with('success', 'Request rejected successfully.');
    }


    public function requestReports()
    {
        return view('bank-manager.request-reports');
    }

    public function reportBlood(Request $request)
{
    $from = $request->input('from_date');
    $to = $request->input('to_date');

    // Counts for each component and state
    $addedRed = RedBlood::whereBetween('created_at', [$from, $to])->count();
    $addedPlasma = Plasma::whereBetween('created_at', [$from, $to])->count();
    $addedPlatelet = Platelet::whereBetween('created_at', [$from, $to])->count();

    $badRed = BadBlood::where('component_type', 'Red Blood')
        ->whereBetween('created_at', [$from, $to])->count();
    $badPlasma = BadBlood::where('component_type', 'Plasma')
        ->whereBetween('created_at', [$from, $to])->count();
    $badPlatelet = BadBlood::where('component_type', 'Platelet')
        ->whereBetween('created_at', [$from, $to])->count();

    $sentRed = RedBlood::onlyTrashed()->whereBetween('deleted_at', [$from, $to])->count();
    $sentPlasma = Plasma::onlyTrashed()->whereBetween('deleted_at', [$from, $to])->count();
    $sentPlatelet = Platelet::onlyTrashed()->whereBetween('deleted_at', [$from, $to])->count();

    return view('bank-manager.blood-report-result', compact(
        'from', 'to',
        'addedRed', 'addedPlasma', 'addedPlatelet',
        'badRed', 'badPlasma', 'badPlatelet',
        'sentRed', 'sentPlasma', 'sentPlatelet'
    ));
}

    public function reportDonors(Request $request)
    {
        $from = $request->input('from_date');
        $to = $request->input('to_date');

        $added = Donor::whereBetween('created_at', [$from, $to])->count();
        $archived = Donor::onlyTrashed()->whereBetween('deleted_at', [$from, $to])->count();

        return view('bank-manager.donors-report-result', [
            'from'=> $from,
            'to'=>$to,
            'added'=>$added,
            'archived'=>$archived,
        ]);
    }

}