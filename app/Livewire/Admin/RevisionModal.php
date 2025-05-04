<?php

namespace App\Livewire\Admin;

use App\Models\Ticket;
use Livewire\Attributes\On;
use Livewire\Component;

class RevisionModal extends Component
{
    public $open = false;
    public $ticketEstatus = '';
    public $ticket = null;

    #[On('abrir-revision-modal')]
    public function abrir($folio)
    {
        $this->open = true;
        $this->ticket = Ticket::with(['usuario.user', 'equipo', 'opciones'])
            ->where('folio', $folio)
            ->firstOrFail();
        $this->ticketEstatus = $this->ticket->estatus_id;
    }

    public function close()
    {
        $this->open = false;
        $this->ticketEstatus = '';
        $this->ticket = null;
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
