<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Ticket;



class EstadisticasModal extends Component
{
    public $open = false;

    #[On('abrir-modal')]
    public function abrir()
    {
        $this->open = true;
    }
    public $ticketEstatus = '';
    public $ticket = null;
    public $tecnicos = [];
    public $tecnico = null;

    protected $rules = [
        'tecnico' => 'required',
    ];

    public function closemodal()
    {
        $this->open = false;
    }

    public function descargarEstadisticas()
    {       
        $pdf = Pdf::loadView('livewire.admin.pdf', [
            'ticket' => $ticket,
        ])->setPaper('a4', 'landscape');
    
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'admin.pdf');
    }

    public function render()
    {
        return view('livewire.admin.estadisticas-modal');
    }
}
