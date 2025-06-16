<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogUser;
use App\Models\HospitalJoinRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // عرض الصفحة الرئيسية لحسابات المستخدمين
    public function users()
    {
        $users = LogUser::where('role', '!=', 'admin')->get();
        return view('admin.users-account', compact('users'));
    }

    // صفحة إضافة مستخدم جديد
    public function addUserForm()
    {
        return view('admin.add-user');
    }

    // تخزين مستخدم جديد
    public function storeUser(Request $request)
    {

        $request->validate([
            'full_name' => 'required|string',
            'username' => 'required|string|unique:log_users,username',
            'password' => 'required|string|min:8',
            'role' => 'required|in:receptionist,laboratory,bank-employee,bank-manager',
        ]);

        // منع إضافة أكثر من مدير بنك
        if ($request->role === 'bank-manager') {
            $existingManager = LogUser::where('role', 'bank-manager')->first();
            if ($existingManager) {
                return back()->withErrors(['error' => 'Only one bank manager is allowed.']);
            }
        }

        LogUser::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/admin/users')->with('success', 'User added successfully.');
    }

    // صفحة تعديل مستخدم
    public function editUser($id)
    {
        $user = LogUser::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    // تنفيذ التعديل
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        $user = LogUser::findOrFail($id);
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/admin/users')->with('success', 'User updated successfully.');
    }

    // حذف مستخدم
    public function deleteUser($id)
    {
        LogUser::destroy($id);
        return redirect('/admin/users')->with('success', 'User deleted successfully.');
    }

    // عرض طلبات الانضمام
    public function joinRequests()
    {
        $requests = HospitalJoinRequest::all();
        return view('admin.requests', compact('requests'));
    }

    // قبول طلب
    public function approveRequest($id)
    {
        $request = HospitalJoinRequest::findOrFail($id);

        LogUser::create([
            'full_name' => $request->hospital_name,
            'username' => $request->username,
            'password' => $request->password,
            'role' => 'hospital-manager',
        ]);

        $request->delete();
        return redirect('/admin/requests')->with('success', 'Request approved and hospital manager added.');
    }

    // رفض طلب
    public function rejectRequest($id)
    {
        HospitalJoinRequest::destroy($id);
        return redirect('/admin/requests')->with('success', 'Request rejected.');
    }
}