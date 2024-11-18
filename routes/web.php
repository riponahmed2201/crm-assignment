<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

//Login
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('login', [AuthController::class, 'login'])->name('login');

//Admin Route Here
Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile',[ProfileController::class, 'index'] )->name('profile');

    //Users
    Route::resources([
        'users' => UserController::class,
    ]);
});
