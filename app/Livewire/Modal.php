<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Modal extends Component
{
    public  $open = false;

    #[On('abrir-modal')]
    public function abrir()
    {
        $this->open = true;
    }

    public function closemodal()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
