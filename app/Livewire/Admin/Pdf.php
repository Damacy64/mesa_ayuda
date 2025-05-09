<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Ticket;


class Pdf extends Component
{   public $totalTickets;
    public $openTickets;
    public $inReviewTickets;
    public $closedTickets;
    public $avgClosedTime;
    public $topTechnician;
    
    public function render()
    {
        $this->totalTickets = Ticket::count();
        $this->openTickets = Ticket::where('estatus_id', 'ABIERTO')->count();
        $this->inReviewTickets = Ticket::where('estatus_id', 'EN REVISION')->count();
        $this->closedTickets = Ticket::where('estatus_id', 'CERRADO')->count();
        $this->avgClosedTime = Ticket::where('estatus_id', 'CERRADO')->avg('tiempo_solucion');

        return view('livewire.admin.pdf');
    }
}
