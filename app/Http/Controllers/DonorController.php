<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::all();
        return view('Receptionist.index', compact('donors'));
    }

    public function create()
    {
        return view('Receptionist.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'donor_name' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'gender' => 'required|in:male,female',
            'donor_identifier' => 'required|unique:donors',
            'address' => 'required',
            'birth_date' => 'required|date',
            'phone' => 'required',
            'email' => 'required|email',
            'record_date' => 'required|date',
        ]);

        Donor::create(array_merge($validated, [
            'smoking' => $request->has('smoking'),
            'alcohol' => $request->has('alcohol'),
            'tattoo' => $request->has('tattoo'),
            'medical_history' => $request->medical_history,
            'treatment_history' => $request->treatment_history,
            'surgical_history' => $request->surgical_history,
            'allergy_info' => $request->allergy_info,
        ]));

        return redirect()->route('donors.index');
    }

    public function show($id)
    {
        $donor = Donor::findOrFail($id);
        return view('Receptionist.show', compact('donor'));
    }

    public function edit($id)
    {
        $donor = Donor::findOrFail($id);
        return view('Receptionist.edit', compact('donor'));
    }

    public function update(Request $request, $id)
    {
        $donor = Donor::findOrFail($id);

        $validated = $request->validate([
            'donor_name' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'gender' => 'required|in:male,female',
            'address' => 'required',
            'birth_date' => 'required|date',
            'phone' => 'required',
            'email' => 'required|email',
            'record_date' => 'required|date',
        ]);

        $donor->update(array_merge($validated, [
            'smoking' => $request->has('smoking'),
            'alcohol' => $request->has('alcohol'),
            'tattoo' => $request->has('tattoo'),
            'medical_history' => $request->medical_history,
            'treatment_history' => $request->treatment_history,
            'surgical_history' => $request->surgical_history,
            'allergy_info' => $request->allergy_info,
        ]));

        return redirect()->route('donors.index');
    }

    public function destroy($id)
    {
        Donor::destroy($id);
        return redirect()->route('donors.index');
    }

    public function archive()
    {
        $donors = Donor::onlyTrashed()->get();
        return view('Receptionist.archive', compact('donors'));
    }

    public function restore($id)
    {
        Donor::withTrashed()->where('id', $id)->restore();
        return redirect()->route('donors.archive');
    }

    public function forceDelete($id)
    {
        Donor::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('donors.archive');
    }
}