<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\LogUser;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = LogUser::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user_logged_in', true);
            Session::put('log_user_id', $user->id);
            Session::put('log_user_role', $user->role);

            if ($user->role === 'hospital-manager') {
                Session::put('full_name', $user->full_name);
            }

            // توجيه حسب الدور
            return match ($user->role) {
                'receptionist' => redirect()->route('donors.index'),
                'laboratory' => redirect()->route('donations.index'),
                'bank-employee' => redirect()->route('bank-employee.blood-inventory.index'),
                'bank-manager' => redirect()->route('bank-manager.blood-inventory'),
                'hospital-manager' => redirect()->route('hospital-manager.home'),
                default => redirect('/'),
            };
        }

        return back()->with('error', 'Incorrect username or password.');
    }

    public function logout()
    {
        Session::forget('log_user_id');
        return redirect('/login');
    }
}