<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    // عرض واجهة تسجيل الدخول للمشرف
    public function showLoginForm()
    {
        if (Session::has('admin_logged_in')) {
            return redirect()->route('admin.users');
        }

        return view('admin.login');
    }

    // تنفيذ تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin_logged_in', true);
            Session::put('admin_id', $admin->id);
            return redirect()->route('admin.users');
        }

        return back()->withErrors(['login' => 'Invalid username or password']);
    }

    // تسجيل الخروج
    public function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('admin_id');
        return redirect()->route('admin.login');
    }
}