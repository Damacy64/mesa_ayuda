<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardUser extends Component
{
    public $open = false;
    public function render()
    {
        return view('livewire.dashboard-user');
    }
    public function closemodal()
    {
        $this->open = false;  
    }
}
