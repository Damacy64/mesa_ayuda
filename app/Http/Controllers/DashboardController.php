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
        return view('Livewire.admin.users');
    }

    public function technical()
    {
        return view('Livewire.admin.technical');
    }

    public function devices()
    {
        return view('Livewire.admin.devices');
    }

    public function areas()
    {
        return view('Livewire.admin.areas');
    }

   
}
