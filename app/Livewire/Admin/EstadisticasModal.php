<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;



class EstadisticasModal extends Component
{
    public $open = false;
    public $totalTickets;
    public $openTickets;
    public $inReviewTickets;
    public $closedTickets;
    public $avgClosedTime;
    public $topTechnician;
    public $ticketsByCategory = [];
    public $startDate;
    public $endDate;

    #[On('abrir-modal')]
    public function abrir()
    {
        $this->open = true;
    }

    public function closemodal()
    {
        $this->open = false;
    }

    public function updatedStartDate()
    {
        $this->calculateStatistics();
    }

    public function updatedEndDate()
    {
        $this->calculateStatistics();
    }

    // Esto es para la tabla del modal
    public function calculateStatistics()
    {
        $baseQuery = Ticket::query();

        if ($this->startDate && $this->endDate) {
            $baseQuery->whereBetween('created_at', [$this->startDate, $this->endDate]);
        }

        $this->totalTickets = Ticket::count();
        $this->openTickets = Ticket::where('estatus_id', 'ABIERTO')->count();
        $this->inReviewTickets = Ticket::where('estatus_id', 'EN REVISION')->count();
        $this->closedTickets = Ticket::where('estatus_id', 'CERRADO')->count();
        $this->avgClosedTime = Ticket::where('estatus_id', 'CERRADO')
        ->select(Ticket::raw("TIME_FORMAT(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo_solucion))), '%H:%i:%s') as avg_time"))
        ->when($this->startDate && $this->endDate, function ($query) {
            $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
        })
        ->value('avg_time');        $this->ticketsByCategory = Ticket::with('opciones')
            ->when($this->startDate && $this->endDate, function ($query) {
                $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
            })
            ->get()
            ->flatMap(function ($ticket) {
                return $ticket->opciones->filter(fn($opcion) => $opcion->nivel === 'categoria');
            })
            ->groupBy('valor')
            ->map(fn($items) => $items->count())
            ->toArray();
    }
    // esto es para cuando lo descargue pdf
   
    public function exportarPDF()
    {
        $data = [
            'totalTickets' => $this->totalTickets,
            'openTickets' => $this->openTickets,
            'inReviewTickets' => $this->inReviewTickets,
            'closedTickets' => $this->closedTickets,
            'avgClosedTime' => $this->avgClosedTime,
            'ticketsByCategory' => $this->ticketsByCategory,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
        ];

        $pdf = Pdf::loadView('livewire.admin.pdf', $data);
       return response()->streamDownload(function () use ($pdf) {
         echo $pdf->stream();
        }, 'estadisticas.pdf');

    }

    // esto es para mandarlo a  la vista del pdf 
    // public function exportarPDF()
    // {
    //     return redirect()->route('admin.pdf', [
    //         'startDate' => $this->startDate,
    //         'endDate' => $this->endDate,
    //     ]);
    // }

    public function render()
    {
        return view('livewire.admin.estadisticas-modal');
      
    }
}
