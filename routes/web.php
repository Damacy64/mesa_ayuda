<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('reset-password/{token}', function ($token) {
    return view('auth.reset-password', [
        'token' => $token,
        'email' => request('email')
    ]);
})->middleware('guest')->name('password.reset');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');   
    Route::get('/devices', [DashboardController::class, 'devices'])->name('devices');   
    Route::get('/users', [DashboardController::class, 'users'])->name('users');   
    Route::get('/technical', [DashboardController::class, 'technical'])->name('technical');   
    Route::get('/areas', [DashboardController::class, 'areas'])->name('areas');   
    Route::get('/pdf', [DashboardController::class, 'pdf'])->name('admin.pdf');   

   
});