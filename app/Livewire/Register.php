<?php

namespace App\Livewire;

use App\Models\Area;
use App\Models\Department;
use App\Models\Location;
use App\Models\Gender;
use Livewire\Component;

class Register extends Component
{
    public $area = null;
    public $departamento = null;
    public $departamentos = [];
    public $areas = [];
    public $ubicaciones = [];
    public $generos = [];

    public function mount(){
        $this->generos = Gender::all();
        $this->areas = Area::all();
        //$this->areas = Area::where('visible', true)->get();
        $this->ubicaciones = Location::all();
        $this->departamentos = collect();
    }

    public function updatedArea($value)
    {
        $this->departamentos = Department::where('area_id', $value)->get();
        $this->departamento = $this->departamentos->first()->id ?? null;
        $this->departamento = '';
    }

    public function render()
    {
        return view('livewire.register');
    }
}
