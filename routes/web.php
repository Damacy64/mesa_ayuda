<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'index']);
Route::get('/registro', [RegisterController::class, 'index']);
Route::get('/forgot-password', [ForgotPasswordController::class, 'index']);
Route::get('/reset-password', [ResetPasswordController::class, 'index']);

//ruta para los select

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
