<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    
    public $open = false;

    public function render()
    {
        return view('livewire.dashboard');
    }
    public function closemodal()
    {
        $this->open = false;  
    }
}
