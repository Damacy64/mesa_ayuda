<?php

namespace App\Livewire;

use App\Models\Area;
use Livewire\Component;

class RegisterSelectArea extends Component
{
    public $areas = [];

    public function mount(){
        $this->areas = Area::all();
    }

    public function render()
    {
        return view('livewire.register-select-area');
    }
}
