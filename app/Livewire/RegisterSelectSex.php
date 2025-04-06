<?php

namespace App\Livewire;

use App\Models\Gender;
use Livewire\Component;

class RegisterSelectSex extends Component
{
    public $generos = [];

    public function mount(){
        $this->generos = Gender::all();
    }

    public function render()
    {
        return view('livewire.register-select-sex');
    }
}
