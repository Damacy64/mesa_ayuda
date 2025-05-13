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
    
     public function pdf(request $request){
     if (Auth::user()->role->rol !== 'ADMIN') {
     abort(403, 'Acceso no autorizado');
    }
    // esto para ver la vista pdf
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');
        $tickets = Ticket::whereBetween('created_at', [$startDate, $endDate])->get();
        $totalTickets = Ticket::whereBetween('created_at', [$startDate, $endDate])->count();
        $openTickets = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('estatus_id', 'ABIERTO')->count();
        $inReviewTickets = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('estatus_id', 'EN REVISION')->count();
        $closedTickets = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('estatus_id', 'CERRADO')->count();
        $avgClosedTime = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('estatus_id', 'CERRADO')->avg('tiempo_solucion');
        
        $ticketsByCategory = Ticket::with('opciones')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->flatMap(function ($ticket) {
                return $ticket->opciones->filter(fn($opcion) => $opcion->nivel === 'categoria');
            })
            ->groupBy('valor')
            ->map(fn($items) => $items->count())
            ->toArray();
        
        $data = [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'totalTickets' => $totalTickets,
            'openTickets' => $openTickets,
            'inReviewTickets' => $inReviewTickets,
            'closedTickets' => $closedTickets,
            'avgClosedTime' => $avgClosedTime,
            'ticketsByCategory' => $ticketsByCategory,
        ];
        
        $pdf = Pdf::loadView('livewire.admin.pdf', $data);
        return $pdf->stream("estadisticas_{$startDate}_{$endDate}.pdf");

        // esto para descargar pdf 
    //  return view('livewire.admin.pdf');


}

}