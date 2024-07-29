<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/register', function () {
    return view('register');
});

Route::get('/userdetails', function () {
    return view('userdetails');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/userdetails', [AuthController::class, 'userdetails'])->name('userdetails');
