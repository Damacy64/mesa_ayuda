<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Ticket;


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
        if (Auth::user()->role->rol !== 'ADMIN') {
            abort(403, 'Acceso no autorizado');
        }

        return view('admin.users');
    }

    public function technical()
    {
        if (Auth::user()->role->rol !== 'ADMIN') {
            abort(403, 'Acceso no autorizado');
        }

        return view('admin.technical');
    }

    public function devices()
    {
        if (Auth::user()->role->rol !== 'ADMIN') {
            abort(403, 'Acceso no autorizado');
        }

        return view('livewire.admin.devices');
    }

    public function areas()
    {
        if (Auth::user()->role->rol !== 'ADMIN') {
            abort(403, 'Acceso no autorizado');
        }

        return view('Livewire.admin.areas');
    }

    public function pdf()
    {
        if (Auth::user()->role->rol !== 'ADMIN') {
            abort(403, 'Acceso no autorizado');
        }

        return view('livewire.admin.pdf');
    }
}
