<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

// Users
Route::resource('/user', UserController::class)->middleware('auth')->names([
    'index' => 'user',
    'show' => 'user',
]);
Route::patch('/user/activate/{user:id}', [UserController::class, 'activate'])->middleware('auth')->name('activate');
