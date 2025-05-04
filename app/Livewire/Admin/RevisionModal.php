<?php

namespace App\Livewire\Admin;

use App\Models\Ticket;
use Livewire\Attributes\On;
use Livewire\Component;

class RevisionModal extends Component
{
    public $open = false;
    public $ticketEstatus = '';

    #[On('abrir-revision-modal')]
    public function abrir($folio)
    {
        $this->open = true;
        $ticket = Ticket::findOrFail($folio);
        $this->ticketEstatus = $ticket->estatus_id;
    }

    public function close()
    {
        $this->open = false;
        $this->ticketEstatus = '';
    }

    public function getEstatusProperty()
    {
        if ($this->ticketEstatus === 'CERRADO') {
            return 'Resumen Ticket';
        }

        return 'Actualizar Ticket';
    }

    public function render()
    {
        return view('livewire.admin.revision-modal');
    }
}
