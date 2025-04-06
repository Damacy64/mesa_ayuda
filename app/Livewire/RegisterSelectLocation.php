<?php

namespace App\Livewire;

use App\Models\Location;
use Livewire\Component;

class RegisterSelectLocation extends Component
{
    public $ubicaciones = [];

    public function mount(){
        $this->ubicaciones = Location::all();
    }

    public function render()
    {
        return view('livewire.register-select-location');
    }
}
