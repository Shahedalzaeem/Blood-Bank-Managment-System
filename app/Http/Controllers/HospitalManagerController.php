<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\BloodRequest;

class HospitalManagerController extends Controller
{
    public function index()
    {
        $hospitalName = Session::get('full_name'); // أو حسب ما خزّنته عند تسجيل الدخول
        $requests = \App\Models\BloodRequest::where('hospital_name', $hospitalName)->get();
        return view('hospital-manager.home', compact('requests'));
    }

    public function create() {
        return view('hospital-manager.add');
    }

    public function store(Request $request) {
        $request->validate([
            'blood_component' => 'required',
            'blood_type' => 'required',
            'rhesus_factor' => 'required',
            'quantity' => 'required|integer|min:1',
            'request_date' => 'required|date',
        ]);

        BloodRequest::create([
        'blood_component' => $request->blood_component,
        'blood_type' => $request->blood_type,
        'rhesus_factor' => $request->rhesus_factor,
        'quantity' => $request->quantity,
        'request_date' => $request->request_date,
        'hospital_name' => Session::get('full_name'), // أو Session::get('username') حسب المتاح
        ]);
        return redirect()->route('hospital-manager.home')->with('success', 'Request submitted');
    }

    public function edit($id) {
        $request = BloodRequest::findOrFail($id);
        return view('hospital-manager.edit', compact('request'));
    }

    public function update(Request $request, $id) {
        $record = BloodRequest::findOrFail($id);
        $record->update($request->only(['component_type', 'blood_type', 'rhesus_factor', 'quantity', 'request_date']));
        return redirect()->route('hospital-manager.home')->with('success', 'Request updated');
    }

    public function destroy($id) {
        BloodRequest::destroy($id);
        return back()->with('success', 'Request deleted');
    }
}