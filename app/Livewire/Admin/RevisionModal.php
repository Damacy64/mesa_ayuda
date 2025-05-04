<?php

namespace App\Livewire\Admin;

use App\Models\Support;
use App\Models\Ticket;
use Livewire\Attributes\On;
use Livewire\Component;

class RevisionModal extends Component
{
    public $open = false;
    public $ticketEstatus = '';
    public $ticket = null;
    public $tecnicos = [];
    public $tecnico = null;

    protected $rules = [
        'tecnico' => 'required',
    ];

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
        $this->tecnico = null;
    }

    public function reasignarTecnico()
    {
        $this->validate();

        $this->ticket->update([
            'tecnico_id' => $this->tecnico,
        ]);

        $this->close();
        $this->dispatch('reasignado');
    }

    public function getEstatusProperty()
    {
        if ($this->ticketEstatus === 'CERRADO') {
            return 'Resumen Ticket';
        }

        return 'Actualizar Ticket';
    }

    public function mount()
    {
        $this->tecnicos = Support::all();
    }

    public function render()
    {
        return view('livewire.admin.revision-modal');
    }
}
