<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HospitalJoinRequest;
use Illuminate\Support\Facades\Hash;

class HospitalJoinRequestController extends Controller
{
    public function showForm()
    {
        return view('hospital-manager.join');
    }

    public function submitRequest(Request $request)
    {
        $request->validate([
            'hospital_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:hospital_join_requests,username',
            'password' => 'required|string|min:6',
        ]);

        HospitalJoinRequest::create([
            'hospital_name' => $request->hospital_name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Your join request has been submitted.');
    }
}