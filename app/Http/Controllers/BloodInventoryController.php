<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BloodUnit;
use App\Models\ProcessedBlood;
use App\Models\RedBlood;
use App\Models\Plasma;
use App\Models\Platelet;
use App\Models\BloodArchive;

class BloodInventoryController extends Controller
{
    public function index()
    {
        $bloodUnits = BloodUnit::all();
        return view('bank-employee.blood-inventory.index', compact('bloodUnits'));
    }

    public function process($id)
    {
        $bloodUnit = BloodUnit::findOrFail($id);

        // إضافة للسجلات المؤرشفة
        BloodArchive::create([
            'blood_type' => $bloodUnit->blood_type,
            'rhesus_factor' => $bloodUnit->rhesus_factor,
            'quantity' => $bloodUnit->quantity,
        ]);

        // إنشاء المعالجة
        ProcessedBlood::create([
            'blood_unit_id' => $bloodUnit->id,
            'quantity' => $bloodUnit->quantity,
        ]);

        // حساب تاريخ الانتهاء

        RedBlood::create([
            'blood_type' => $bloodUnit->blood_type,
            'rhesus_factor' => $bloodUnit->rhesus_factor,
            'quantity' => $bloodUnit->quantity,
            'original_date' => $bloodUnit->created_at->toDateString(),
            'expiration_timer' => $bloodUnit->created_at->copy()->addDays(42),
        ]);

        Plasma::create([
            'blood_type' => $bloodUnit->blood_type,
            'rhesus_factor' => $bloodUnit->rhesus_factor,
            'quantity' => $bloodUnit->quantity,
            'original_date' => $bloodUnit->created_at->toDateString(),
            'expiration_timer' => $bloodUnit->created_at->copy()->addDays(365),
        ]);

        Platelet::create([
            'blood_type' => $bloodUnit->blood_type,
            'rhesus_factor' => $bloodUnit->rhesus_factor,
            'quantity' => $bloodUnit->quantity,
            'original_date' => $bloodUnit->created_at->toDateString(),
            'expiration_timer' => $bloodUnit->created_at->copy()->addDays(5),
        ]);

        // حذف الكيس من قائمة غير المعالج
        $bloodUnit->delete();

        return redirect()->back()->with('success', 'Blood processed successfully.');
    }

    public function destroy($id)
    {
        BloodUnit::destroy($id);
        return redirect()->back()->with('success', 'Blood unit deleted.');
    }
}