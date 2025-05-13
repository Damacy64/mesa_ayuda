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
    
    // public function pdf(request $request){
    //      if (Auth::user()->role->rol !== 'ADMIN') {
    //         abort(403, 'Acceso no autorizado');
    //     }
    //     $startDate = $request->query('startDate');
    //     $endDate = $request->query('endDate');
    
    //     $pdf = Pdf::loadView('livewire.admin.pdf', [

    //         'totalTickets' => Ticket::count(),
    //         'openTickets' => Ticket::where('estatus_id', 'ABIERTO')->count(),
    //         'inReviewTickets' => Ticket::where('estatus_id', 'EN REVISION')->count(),
    //         'closedTickets' => Ticket::where('estatus_id', 'CERRADO')->count(),
    //         'avgClosedTime' => Ticket::where('estatus_id', 'CERRADO')->avg('tiempo_solucion'),
    //         'ticketsByCategory' => Ticket::with('opciones')
    //             ->get()
    //             ->flatMap(function ($ticket) {
    //                 return $ticket->opciones->filter(fn ($opcion) => $opcion->nivel === 'categoria');
    //             })
    //             ->groupBy('valor')
    //             ->map(fn ($items) => $items->count())
    //             ->toArray(),
    //     ]);
    //     return $pdf->stream();
    //     return $pdf->download('estadisticas.pdf');
    //     return view('livewire.admin.pdf');
    public function pdf(Request $request)
    {
        if (Auth::user()->role->rol !== 'ADMIN') {
            abort(403, 'Acceso no autorizado');
        }
    
        // Obtener las fechas del período seleccionado
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');
    
        // Filtrar los datos según las fechas seleccionadas
        $query = Ticket::query();
    
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        // Calcular estadísticas
        $totalTickets = $query->count();
        $openTickets = $query->where('estatus_id', 'ABIERTO')->count();
        $inReviewTickets = $query->where('estatus_id', 'EN REVISION')->count();
        $closedTickets = $query->where('estatus_id', 'CERRADO')->count();
        $avgClosedTime = $query->where('estatus_id', 'CERRADO')->avg('tiempo_solucion');
    
        // Calcular el total de tickets por categoría
        $ticketsByCategory = $query->with('opciones')
            ->get()
            ->flatMap(function ($ticket) {
                return $ticket->opciones->filter(fn ($opcion) => $opcion->nivel === 'categoria');
            })
            ->groupBy('valor')
            ->map(fn ($items) => $items->count())
            ->toArray();
    
        // Generar el PDF con los datos
        $pdf = Pdf::loadView('livewire.admin.pdf', [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'totalTickets' => $totalTickets,
            'openTickets' => $openTickets,
            'inReviewTickets' => $inReviewTickets,
            'closedTickets' => $closedTickets,
            'avgClosedTime' => $avgClosedTime,
            'ticketsByCategory' => $ticketsByCategory,
        ]);
    
        return $pdf->stream('estadisticas.pdf');
    
    }

}
