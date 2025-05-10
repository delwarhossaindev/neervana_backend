<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::resource('users', UserController::class);


Auth::routes();
