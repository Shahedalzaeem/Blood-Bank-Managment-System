<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BadBlood;

class BadBloodController extends Controller
{
    public function index()
    {
        $records = BadBlood::all();
        return view('bank-employee.bad-blood.index', compact('records'));
    }

    public function destroy($id)
    {
        BadBlood::destroy($id);
        return redirect()->back()->with('success', 'Deleted.');
    }
}