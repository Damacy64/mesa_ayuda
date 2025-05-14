<?php

namespace App\Livewire\Admin;


use App\Models\Area;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Str;


class AgregarArea extends Component
{
    public $open = false;
    public $nombre;
    public $descripcion;

    #[On('abrir-modal')]
    public function abrir()
    {
        $this->open = true;
    }

    public function closemodal()
    {
        $this->reset(['nombre', 'descripcion']);
        $this->open = false;
        $this->resetValidation();
    }

    protected $rules = [
        'nombre' => ['required', 'string', 'max:50', 'unique:areas,nombre'],
        'descripcion' => ['required', 'string', 'max:255'],
    ];

    public function guardarArea()
    {
        $this->validate();

        Area::create([
            'nombre' => Str::upper($this->nombre),
            'descripcion' =>Str::upper($this->descripcion),
        ]);

        $this->closemodal();
    }

    public function render()
    {
        return view('livewire.admin.agregar-area');
    }
}
