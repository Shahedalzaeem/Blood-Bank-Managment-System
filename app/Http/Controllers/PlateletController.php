<?php

namespace App\Http\Controllers;

use App\Models\Platelet;
use App\Models\BadBlood;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlateletController extends Controller
{
    public function index()
    {
        // حذف الأكياس المنتهية الصلاحية ونقلها إلى جدول الدم الفاسد
        $expired = Platelet::where('expiration_timer', '<', Carbon::now())->get();

        foreach ($expired as $item) {
            BadBlood::create([
                'component_type' => 'Platelet',
                'blood_type' => $item->blood_type,
                'rhesus_factor' => $item->rhesus_factor,
                'quantity' => $item->quantity,
            ]);

            $item->delete();
        }

        // استرجاع السجلات المتبقية لعرضها
        $records = Platelet::all();
        return view('bank-employee.platelet.index', compact('records'));
    }

    public function edit($id)
    {
        $record = Platelet::findOrFail($id);
        return view('bank-employee.platelet.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $record = Platelet::findOrFail($id);
        $record->update($request->only(['quantity']));
        return redirect()->route('bank-employee.platelet.index')->with('success', 'Updated.');
    }

    public function destroy($id)
    {
        Platelet::destroy($id);
        return redirect()->back()->with('success', 'Deleted.');
    }
}