<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dispositivos;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');   
    Route::get('/dispositivos', [DashboardController::class, 'dispositivos'])->name('dispositivos');   
    Route::get('/usuarios', [DashboardController::class, 'usuarios'])->name('usuarios');   
    Route::get('/tecnicos', [DashboardController::class, 'tecnicos'])->name('tecnicos');   
    Route::get('/areas', [DashboardController::class, 'areas'])->name('areas');   

   
});
