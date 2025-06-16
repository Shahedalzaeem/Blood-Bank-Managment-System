<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\BloodTestController;
use App\Http\Controllers\BloodUnitController;
use App\Http\Controllers\BloodInventoryController;
use App\Http\Controllers\RedBloodController;
use App\Http\Controllers\PlasmaController;
use App\Http\Controllers\PlateletController;
use App\Http\Controllers\BadBloodController;
use App\Http\Controllers\BloodArchiveController;
use App\Http\Controllers\BankManagerController;
use App\Http\Controllers\HospitalJoinRequestController;
use App\Http\Controllers\HospitalManagerController;
use App\Http\Controllers\UserAuthController;
use App\Http\Middleware\AuthLogUser;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;


Route::get('/home', function () { return view('home'); })->name('home');
Route::get('/about-us', function () { return view('about-us'); })->name('about-us');
Route::get('/our-services', function () { return view('our-services'); })->name('our-services');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// حماية لوحة تحكم المشرف باستخدام middleware
Route::middleware('admin')->group(function () {

Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
Route::post('/admin/users/{id}/update', [AdminController::class, 'updateUser'])->name('admin.users.update');
Route::delete('/admin/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

Route::get('/admin/add-user', [AdminController::class, 'addUserForm'])->name('admin.add-user');
Route::post('/admin/store-user', [AdminController::class, 'storeUser'])->name('admin.store-user');

Route::get('/admin/requests', [AdminController::class, 'joinRequests'])->name('admin.requests');
Route::post('/admin/requests/{id}/approve', [AdminController::class, 'approveRequest'])->name('admin.requests.approve');
Route::post('/admin/requests/{id}/reject', [AdminController::class, 'rejectRequest'])->name('admin.requests.reject');
});

Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login.form');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');


Route::middleware('auth.loguser')->group(function () {
Route::get('/donors', [DonorController::class, 'index'])->name('donors.index');
Route::get('/donors/create', [DonorController::class, 'create'])->name('donors.create');
Route::post('/donors', [DonorController::class, 'store'])->name('donors.store');
Route::get('/donors/{id}', [DonorController::class, 'show'])->name('donors.show');
Route::get('/donors/{id}/edit', [DonorController::class, 'edit'])->name('donors.edit');
Route::put('/donors/{id}', [DonorController::class, 'update'])->name('donors.update');
Route::delete('/donors/{id}', [DonorController::class, 'destroy'])->name('donors.destroy');
Route::get('/archive', [DonorController::class, 'archive'])->name('donors.archive');
Route::post('/donors/{id}/restore', [DonorController::class, 'restore'])->name('donors.restore');
Route::delete('/donors/{id}/force-delete', [DonorController::class, 'forceDelete'])->name('donors.forceDelete');
});


Route::middleware('auth.loguser')->group(function () {
Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');
Route::get('/donations/create', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
Route::get('/donations/{id}/edit', [DonationController::class, 'edit'])->name('donations.edit');
Route::put('/donations/{id}', [DonationController::class, 'update'])->name('donations.update');
Route::delete('/donations/{id}', [DonationController::class, 'destroy'])->name('donations.destroy');

Route::get('/blood-tests', [BloodTestController::class, 'index'])->name('blood-tests.index');
Route::get('/blood-tests/create', [BloodTestController::class, 'create'])->name('blood-tests.create');
Route::post('/blood-tests', [BloodTestController::class, 'store'])->name('blood-tests.store');
Route::get('/blood-tests/{id}/edit', [BloodTestController::class, 'edit'])->name('blood-tests.edit');
Route::put('/blood-tests/{id}', [BloodTestController::class, 'update'])->name('blood-tests.update');
Route::delete('/blood-tests/{id}', [BloodTestController::class, 'destroy'])->name('blood-tests.destroy');

Route::get('/blood-units/create', [BloodUnitController::class, 'create'])->name('blood-units.create');
Route::post('/blood-units', [BloodUnitController::class, 'store'])->name('blood-units.store');
});


Route::middleware('auth.loguser')->group(function () {
Route::get('/bank-employee/blood-inventory', [BloodInventoryController::class, 'index'])->name('bank-employee.blood-inventory.index');
Route::delete('/bank-employee/blood-inventory/{id}', [BloodInventoryController::class, 'destroy'])->name('bank-employee.blood-inventory.destroy');
Route::post('/bank-employee/blood-inventory/{id}/process', [BloodInventoryController::class, 'process'])->name('bank-employee.blood-inventory.process');

Route::get('/bank-employee/red-blood', [RedBloodController::class, 'index'])->name('bank-employee.red-blood.index');
Route::get('/bank-employee/red-blood/{id}/edit', [RedBloodController::class, 'edit'])->name('bank-employee.red-blood.edit');
Route::put('/bank-employee/red-blood/{id}', [RedBloodController::class, 'update'])->name('bank-employee.red-blood.update');
Route::delete('/bank-employee/red-blood/{id}', [RedBloodController::class, 'destroy'])->name('bank-employee.red-blood.destroy');

Route::get('/bank-employee/plasma', [PlasmaController::class, 'index'])->name('bank-employee.plasma.index');
Route::get('/bank-employee/plasma/{id}/edit', [PlasmaController::class, 'edit'])->name('bank-employee.plasma.edit');
Route::put('/bank-employee/plasma/{id}', [PlasmaController::class, 'update'])->name('bank-employee.plasma.update');
Route::delete('/bank-employee/plasma/{id}', [PlasmaController::class, 'destroy'])->name('bank-employee.plasma.destroy');

Route::get('/bank-employee/platelet', [PlateletController::class, 'index'])->name('bank-employee.platelet.index');
Route::get('/bank-employee/platelet/{id}/edit', [PlateletController::class, 'edit'])->name('bank-employee.platelet.edit');
Route::put('/bank-employee/platelet/{id}', [PlateletController::class, 'update'])->name('bank-employee.platelet.update');
Route::delete('/bank-employee/platelet/{id}', [PlateletController::class, 'destroy'])->name('bank-employee.platelet.destroy');

Route::get('/bank-employee/bad-blood', [BadBloodController::class, 'index'])->name('bank-employee.bad-blood.index');
Route::delete('/bank-employee/bad-blood/{id}', [BadBloodController::class, 'destroy'])->name('bank-employee.bad-blood.destroy');

Route::get('/bank-employee/archive', [BloodArchiveController::class, 'index'])->name('bank-employee.archive.index');
Route::delete('/bank-employee/archive/{id}', [BloodArchiveController::class, 'destroy'])->name('bank-employee.archive.destroy');
});

Route::middleware('auth.loguser')->group(function () {
Route::get('/bank-manager/blood-inventory', [BankManagerController::class, 'bloodInventory'])->name('bank-manager.blood-inventory');
Route::get('/bank-manager/blood-requests', [BankManagerController::class, 'bloodRequests'])->name('bank-manager.blood-requests');

Route::post('/bank-manager/blood-requests/{id}/approve', [BankManagerController::class, 'approveRequest'])->name('bank-manager.requests.approve');
Route::post('/bank-manager/blood-requests/{id}/reject', [BankManagerController::class, 'rejectRequest'])->name('bank-manager.requests.reject');

Route::get('/bank-manager/request-reports', [BankManagerController::class, 'requestReports'])->name('bank-manager.request-reports');
Route::post('/bank-manager/report/blood', [BankManagerController::class, 'reportBlood'])->name('bank-manager.report.blood');
Route::post('/bank-manager/report/donors', [BankManagerController::class, 'reportDonors'])->name('bank-manager.report.donors');
});


Route::get('/hospital-request', [HospitalJoinRequestController::class, 'showForm'])->name('hospital-manager.form');
Route::post('/hospital-request', [HospitalJoinRequestController::class, 'submitRequest'])->name('hospital-manager.submit');

Route::middleware('auth.loguser')->group(function () {
Route::get('/hospital-manager', [HospitalManagerController::class, 'index'])->name('hospital-manager.home');
Route::get('/hospital-manager/add', [HospitalManagerController::class, 'create'])->name('hospital-manager.add');
Route::post('/hospital-manager/store', [HospitalManagerController::class, 'store'])->name('hospital-manager.store');
Route::get('/hospital-manager/edit/{id}', [HospitalManagerController::class, 'edit'])->name('hospital-manager.edit');
Route::post('/hospital-manager/update/{id}', [HospitalManagerController::class, 'update'])->name('hospital-manager.update');
Route::delete('/hospital-manager/delete/{id}', [HospitalManagerController::class, 'destroy'])->name('hospital-manager.destroy');
});