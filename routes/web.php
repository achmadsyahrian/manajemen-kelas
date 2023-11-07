<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rute publik yang dapat diakses oleh semua pengguna
Route::middleware(['guest'])->group(function () {
    Route::get('/sign-in', [AuthController::class, 'signin'])->name('login');
    Route::post('/sign-in', [AuthController::class, 'authenticate']);
    Route::get('/sign-up', [AuthController::class, 'signup']);
    Route::post('/sign-up', [AuthController::class, 'store']);
});


// Rute yang memerlukan otentikasi pengguna
Route::middleware(['auth'])->group(function () {;
    Route::get('/',  DashboardController::class)->name('home');
    Route::post('/sign-out', [AuthController::class, 'signout'])->name('sign-out');

    // User
    Route::resource('/user', UserController::class);
    Route::patch('/user/activated/{user:id}', [UserController::class, 'activated'])->name('user.activated');
    Route::patch('/user/disable/{user:id}', [UserController::class, 'disable'])->name('user.disable');

    // Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/{user:id}', [UserController::class, 'updateProfile']);

    // Change Password
    Route::get('/profile/change-password', [PasswordController::class, 'edit']);
    Route::patch('/profile/change-password/{user:id}', [PasswordController::class, 'update']);
});
