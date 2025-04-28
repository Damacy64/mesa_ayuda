<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalReabrir extends Component
{

    public $open = false;
    public $folio;

    #[On('reabrir-modal')]
    public function reabrirModal($folio)
    {
        $this->folio = $folio;
        $this->open = true;
        
    }

    public function cerrarModal()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.user.modal-reabrir');
    }
}
