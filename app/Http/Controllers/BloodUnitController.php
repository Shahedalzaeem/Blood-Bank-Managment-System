<?php

// app/Http/Controllers/BloodUnitController.php
namespace App\Http\Controllers;

use App\Models\BloodUnit;
use Illuminate\Http\Request;

class BloodUnitController extends Controller
{
    public function create()
    {
        return view('Laboratory.blood_units.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'blood_type' => 'required',
            'rhesus_factor' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        BloodUnit::create($request->all());
        return redirect()->back()->with('success', 'Blood units added successfully');
    }
}