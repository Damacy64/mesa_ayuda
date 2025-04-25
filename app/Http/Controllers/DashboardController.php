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
    
    public function usuarios()
    {
        return view('Livewire.admin.usuarios');
    }

    public function tecnicos()
    {
        return view('Livewire.admin.tecnicos');
    }

    public function dispositivos()
    {
        return view('Livewire.admin.dispositivos');
    }

    public function areas()
    {
        return view('Livewire.admin.areas');
    }

   
}
