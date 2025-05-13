<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Ticket;

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
    
    
    public function calculateStatistics()
    {
        $baseQuery = Ticket::query();
    
        if ($this->startDate && $this->endDate) {
            $baseQuery->whereBetween('created_at', [$this->startDate,$this->endDate]);
        }
    
        $this->totalTickets = Ticket::count();
        $this->openTickets = Ticket::where('estatus_id', 'ABIERTO')->count();
        $this->inReviewTickets = Ticket::where('estatus_id', 'EN REVISION')->count();
        $this->closedTickets = Ticket::where('estatus_id', 'CERRADO')->count();
        $this->avgClosedTime = Ticket::where('estatus_id', 'CERRADO')->avg('tiempo_solucion');
        $this->ticketsByCategory = Ticket::with('opciones')
        ->when($this->startDate && $this->endDate, function ($query) {
            $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
        })
        ->get()
        ->flatMap(function ($ticket) {
            return $ticket->opciones->filter(fn ($opcion) => $opcion->nivel === 'categoria');
        })
        ->groupBy('valor')
        ->map(fn ($items) => $items->count())
        ->toArray();

        }
     
    public function render()
    {
        return view('livewire.admin.estadisticas-modal');
        // $pdf = Pdf::loadView('livewire.admin.pdf');
        // return $pdf->stream();
    }

    }
