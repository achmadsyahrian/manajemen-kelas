<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware('auth');

// Authentication
Route::get('/sign-in', [AuthController::class, 'signin'])->middleware('guest')->name('login');
Route::post('/sign-in', [AuthController::class, 'authenticate'])->middleware('guest');
Route::post('/sign-out', [AuthController::class, 'signout'])->middleware('auth')->name('sign-out');

Route::get('/sign-up', [AuthController::class, 'signup'])->middleware('guest');
Route::post('/sign-up', [AuthController::class, 'store'])->middleware('guest');
