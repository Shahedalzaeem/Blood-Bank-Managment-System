<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with('donor')->get();
        return view('Laboratory.donations.index', compact('donations'));
    }

    public function create()
    {
        $donors = Donor::all();
        return view('Laboratory.donations.create', compact('donors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'donation_date' => 'required|date',
            'weight' => 'required|numeric',
            'blood_type' => 'required',
            'rhesus_factor' => 'required',
            'hemoglobin' => 'required|numeric|between:13.0,16.0',
        ]);

        Donation::create($request->all());
        return redirect()->route('donations.index')->with('success', 'Donation added successfully');
    }

    public function edit($id)
    {
        $donation = Donation::findOrFail($id);
        $donors = Donor::all();
        return view('Laboratory.donations.edit', compact('donation', 'donors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'donation_date' => 'required|date',
            'weight' => 'required|numeric',
            'blood_type' => 'required',
            'rhesus_factor' => 'required',
            'hemoglobin' => 'required|numeric|between:13.0,16.0',
        ]);

        $donation = Donation::findOrFail($id);
        $donation->update($request->all());
        return redirect()->route('donations.index')->with('success', 'Donation updated successfully');
    }

    public function destroy($id)
    {
        Donation::findOrFail($id)->delete();
        return redirect()->route('donations.index')->with('success', 'Donation deleted successfully');
    }
}