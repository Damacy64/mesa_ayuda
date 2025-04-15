<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

//Route::get('/registro', [RegisterController::class, 'show']);
//Route::post('/registro', [RegisterController::class, 'create']);

//Route::get('/forgot-password', [ForgotPasswordController::class, 'show']);
//Route::get('/reset-password', [ResetPasswordController::class, 'show']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () { 
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
