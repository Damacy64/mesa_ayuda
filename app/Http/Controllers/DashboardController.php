<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->role->rol) {
            case 'ADMIN':
                return view('dashboard-admin');
            case 'SOPORTE':
                return view('dashboard-support');
            default:
                return view('dashboard');
        }
    }

    public function users()
    {
        if (Auth::user()->role->rol == 'ADMIN') {
            return view('admin.users');
        }
    }

    public function technical()
    {
        if (Auth::user()->role->rol == 'ADMIN') {
            return view('Livewire.admin.technical');
        }
    }

    public function devices()
    {
        if (Auth::user()->role->rol == 'ADMIN') {
            return view('Livewire.admin.devices');
        }
    }

    public function areas()
    {
        if (Auth::user()->role->rol == 'ADMIN') {
            return view('Livewire.admin.areas');
        }
    }
}