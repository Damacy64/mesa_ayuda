<?php

namespace App\Livewire;

use App\Models\Area;
use App\Models\Location;
use App\Models\Gender;
use Livewire\Component;

class Register extends Component
{
    public $areas = [];
    public $ubicaciones = [];
    public $generos = [];

    public function mount(){
        $this->generos = Gender::all();
        $this->ubicaciones = Location::all();
        $this->areas = Area::all();
    }

    public function render()
    {
        return view('livewire.register');
    }
}
