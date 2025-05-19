<?php

namespace App\Livewire\Admin;

use App\Models\ticketHistory;
use Livewire\Attributes\On;
use Livewire\Component;

class TicketHistorial extends Component
{
    public $open=false;
    public $historial;

    #[On('abrir-historial-modal')]
    public function abrir($folio)
    {
        $this->open = true;
        $this->historial = TicketHistory::where('ticket_id', $folio)->get();
    }

    public function cerrar()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.ticket-historial');
    }
}
