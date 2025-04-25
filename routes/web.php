<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\Admin\Dispositivos;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
   
    Route::get('/dispositivos', Dispositivos::class)->name('dispositivos');
   
    
});
