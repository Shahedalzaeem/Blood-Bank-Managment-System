<?php

namespace App\Http\Controllers;

use App\Models\Plasma;
use App\Models\BadBlood;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlasmaController extends Controller
{
    public function index()
    {

        $expired = Plasma::where('expiration_timer', '<', Carbon::now())->get();

        foreach ($expired as $item) {
            BadBlood::create([
                'component_type' => 'Plasma',
                'blood_type' => $item->blood_type,
                'rhesus_factor' => $item->rhesus_factor,
                'quantity' => $item->quantity,
            ]);

            $item->delete();
        }


        $records = Plasma::all();
        return view('bank-employee.plasma.index', compact('records'));
    }

    public function edit($id)
    {
        $record = Plasma::findOrFail($id);
        return view('bank-employee.plasma.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = Plasma::findOrFail($id);
        $record->update($request->only(['quantity']));
        return redirect()->route('bank-employee.plasma.index')->with('success', 'Updated.');
    }

    public function destroy($id)
    {
        Plasma::destroy($id);
        return redirect()->back()->with('success', 'Deleted.');
    }
}