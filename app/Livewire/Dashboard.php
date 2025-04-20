<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{

    public $open;

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function openmodal()
    {
        $this->open = true;  
    }
}
