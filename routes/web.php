<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/',  DashboardController::class);
    Route::post('/sign-out', [AuthController::class, 'signout'])->name('sign-out');

    // User
    Route::resource('/user', UserController::class)->names([
        'index' => 'user',
        'show' => 'user',
    ]);
    Route::patch('/user/activate/{user:id}', [UserController::class, 'activate'])->name('user.activate');
    Route::patch('/user/disable/{user:id}', [UserController::class, 'disable'])->name('user.disable');
});
