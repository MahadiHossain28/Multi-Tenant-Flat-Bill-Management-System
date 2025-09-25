<?php

use App\Http\Controllers\Backend\AssignTenantController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BillCategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FlatController;
use App\Http\Controllers\Backend\HouseOwnerController;
use App\Http\Controllers\Backend\TenantController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login')->name('home');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::resource('house/owner', HouseOwnerController::class)->except('show');
    Route::resource('flat', FlatController::class)->except('show');
    Route::resource('tenant', TenantController::class)->except('show');
    Route::get('flat/{flat}/assign/tenant', [AssignTenantController::class, 'index'])->name('flat.assign.tenant');
    Route::post('flat/{flat}/assign/tenant/store', [AssignTenantController::class, 'store'])->name('flat.assign.tenant.store');
    Route::get('flat/remove/tenant/{tenant}', [AssignTenantController::class, 'remove'])->name('flat.remove.tenant');
    Route::resource('bill-category', BillCategoryController::class)->except('show');


    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
