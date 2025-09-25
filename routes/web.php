<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BuildingController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FlatController;
use App\Http\Controllers\Backend\HouseOwnerController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login')->name('home');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::resource('house/owner', HouseOwnerController::class)->except('show');
    Route::resource('flat', FlatController::class)->except('show');


    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
