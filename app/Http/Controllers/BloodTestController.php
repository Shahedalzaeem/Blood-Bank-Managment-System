<?php

namespace App\Http\Controllers;

use App\Models\BloodTest;
use App\Models\Donation;
use Illuminate\Http\Request;

class BloodTestController extends Controller
{
    public function index()
    {
        $tests = BloodTest::with('donation.donor')->get();
        return view('Laboratory.blood_tests.index', compact('tests'));
    }

    public function create()
    {
        $donations = Donation::all();
        return view('Laboratory.blood_tests.create', compact('donations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'donation_id' => 'required|exists:donations,id',
            'test_date' => 'required|date',
            'hiv_test' => 'required|in:Positive,Negative',
            'hepatitis_test' => 'required|in:Positive,Negative',
            'syphilis_test' => 'required|in:Positive,Negative',
            'htlv_test' => 'required|in:Positive,Negative',
            'malaria_test' => 'required|in:Positive,Negative',
        ]);

        $results = [
            $request->hiv_test,
            $request->hepatitis_test,
            $request->syphilis_test,
            $request->htlv_test,
            $request->malaria_test,
        ];

        if (in_array('Positive', $results)) {
            return back()->withErrors(['error' => 'Blood test cannot be saved if any result is Positive.']);
        }

        BloodTest::create($request->all());
        return redirect()->route('blood-tests.index')->with('success', 'Blood test added successfully');
    }

    public function edit($id)
    {
        $test = BloodTest::findOrFail($id);
        $donations = Donation::all();
        return view('Laboratory.blood_tests.edit', compact('test', 'donations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'donation_id' => 'required|exists:donations,id',
            'test_date' => 'required|date',
            'hiv_test' => 'required',
            'hepatitis_test' => 'required',
            'syphilis_test' => 'required',
            'htlv_test' => 'required',
            'malaria_test' => 'required',
        ]);

        $results = [
            $request->hiv_test,
            $request->hepatitis_test,
            $request->syphilis_test,
            $request->htlv_test,
            $request->malaria_test,
        ];

        if (in_array('Positive', $results)) {
            return back()->withErrors(['error' => 'Blood test cannot be saved if any result is Positive.']);
        }

        $test = BloodTest::findOrFail($id);
        $test->update($request->all());
        return redirect()->route('blood-tests.index')->with('success', 'Blood test updated successfully');
    }

    public function destroy($id)
    {
        BloodTest::findOrFail($id)->delete();
        return redirect()->route('blood-tests.index')->with('success', 'Blood test deleted successfully');
    }
}