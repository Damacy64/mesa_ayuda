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

    public function pdf(){
    
    }

    public function closemodal()
    {
        $this->open = false;
    }
    public function render()
    {
        return view('livewire.admin.estadisticas-modal');
    }
}
