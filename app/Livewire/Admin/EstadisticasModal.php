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
    public $avgOpenTime;
    public $avgReviewTime;
    public $topTechnician;
    
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
    //     $this->totalTickets = Ticket::count();
    //     return view('livewire.admin.estadisticas-modal');
    // }


    // public function getTiempoResolucionAttribute()
    // {
    //     if ($this->estatus_id === 'CERRADO' && $this->created_at && $this->updated_at) {
    //         return $this->created_at->diffInMinutes($this->updated_at);
    //     }

    //     return null;
    // }

    public function render()
{
    $this->totalTickets = Ticket::count();

    $this->openTickets = Ticket::where('estatus_id', 'ABIERTO')->count();
    $this->inReviewTickets = Ticket::where('estatus_id', 'EN REVISION')->count();
    $this->closedTickets = Ticket::where('estatus_id', 'CERRADO')->count();

    $this->avgOpenTime = Ticket::where('estatus_id', 'ABIERTO')->avg('tiempo_solucion');
    $this->avgReviewTime = Ticket::where('estatus_id', 'EN REVISIÓN')->avg('tiempo_solucion');
    $this->avgClosedTime = Ticket::where('estatus_id', 'CERRADO')->avg('tiempo_solucion');

    // $this->topTechnician = Ticket::selectRaw('user_id, COUNT(*) as total')
    //     ->groupBy('user_id')
    //     ->orderByDesc('total')
    //     ->first()?->user->name ?? 'N/A';

    return view('livewire.admin.estadisticas-modal');
}

}
