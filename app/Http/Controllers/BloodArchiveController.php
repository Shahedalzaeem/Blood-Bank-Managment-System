<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BloodArchive;

class BloodArchiveController extends Controller
{
    public function index()
    {
        $records = BloodArchive::all();
        return view('bank-employee.archive.index', compact('records'));
    }

    public function destroy($id)
    {
        BloodArchive::destroy($id);
        return redirect()->back()->with('success', 'Deleted.');
    }
}