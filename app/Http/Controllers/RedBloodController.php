<?php

namespace App\Http\Controllers;

use App\Models\RedBlood;
use App\Models\BadBlood;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RedBloodController extends Controller
{
    public function index()
    {

                // حذف الأكياس المنتهية الصلاحية ونقلها إلى جدول الدم الفاسد
        $expired = RedBlood::where('expiration_timer', '<', Carbon::now())->get();

        foreach ($expired as $item) {
            BadBlood::create([
                'component_type' => 'RedBlood',
                'blood_type' => $item->blood_type,
                'rhesus_factor' => $item->rhesus_factor,
                'quantity' => $item->quantity,

            ]);
    
            $item->delete();
        }


        $records = RedBlood::all();
        return view('bank-employee.red-blood.index', compact('records'));
    }

    public function edit($id)
    {
        $record = RedBlood::findOrFail($id);
        return view('bank-employee.red-blood.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = RedBlood::findOrFail($id);
        $record->update($request->only(['quantity']));
        return redirect()->route('bank-employee.red-blood.index')->with('success', 'Updated.');
    }

    public function destroy($id)
    {
        RedBlood::destroy($id);
        return redirect()->back()->with('success', 'Deleted.');
    }
}