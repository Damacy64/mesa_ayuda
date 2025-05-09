<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Ticket;
use Carbon\Carbon;



class EstadisticasModal extends Component
{
    public $open = false;

    public $totalTickets;
    public $openTickets;
    public $inReviewTickets;
    public $closedTickets;
    public $avgClosedTime;
    public $topTechnician;
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

    // public function render()
    // {

    // $this->totalTickets = Ticket::count();

    // $this->openTickets = Ticket::where('estatus_id', 'ABIERTO')->count();
    // $this->inReviewTickets = Ticket::where('estatus_id', 'EN REVISION')->count();
    // $this->closedTickets = Ticket::where('estatus_id', 'CERRADO')->count();
    // $this->avgClosedTime = Ticket::where('estatus_id', 'CERRADO')->avg('tiempo_solucion');

    // // $this->topTechnician = Ticket::selectRaw('user_id, COUNT(*) as total')
    // //     ->groupBy('user_id')
    // //     ->orderByDesc('total')
    // //     ->first()?->user->name ?? 'N/A';

    // return view('livewire.admin.estadisticas-modal');
    // }
    public function updated($propertyName)
    {
        // Recalcular estadísticas cuando cambien las fechas
        if (in_array($propertyName, ['startDate', 'endDate'])) {
            $this->calculateStatistics();
        }
    }

    public function calculateStatistics()
    {
        $query = Ticket::query();

        // Aplicar filtro de fechas si ambas están definidas
        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay(),
            ]);
        }

        $this->totalTickets = $query->count();
        $this->openTickets = $query->where('estatus_id', 'ABIERTO')->count();
        $this->inReviewTickets = $query->where('estatus_id', 'EN REVISION')->count();
        $this->closedTickets = $query->where('estatus_id', 'CERRADO')->count();
        $this->avgClosedTime = $query->where('estatus_id', 'CERRADO')->avg('tiempo_solucion');
    }

    public function render()
    {
        $this->calculateStatistics();

        return view('livewire.admin.estadisticas-modal');
    }

    }
