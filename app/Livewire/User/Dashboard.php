<?php

namespace App\Livewire\User;

use Livewire\Component;

class Dashboard extends Component
{

    public $open = false;
    public $equipos = [];

    

    public function render()
    {
        return view('livewire.user.dashboard');
    }

}
