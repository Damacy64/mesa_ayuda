<?php

namespace App\Livewire\Admin;

use App\Models\Attribute;
use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;

class AsignarModal extends Component
{
    // Catalogos
    public $open = false;
    public $usuarios = [];
    public $marcas = [];
    public $dispositivos = [];
    public $sistemas = [];
    public $almacenamientos = [];
    public $procesadores = [];
    public $memorias = [];
    public $versionesOffice = [];

    // Modelos wire.model
    public $usuario = null;
    public $marca = null;
    public $dispositivo = null;
    public $sistema = null;
    public $almacenamiento = null;
    public $procesador = null;
    public $memoria = null;
    public $versionOffice = null;

    public $mostraropciones = 0;
    
    #[On('asignar-modal')]
    public function abrir()
    {
        $this->open = true;
    }

    public function mount()
    {
        $this->usuarios = User::all();
        $this->marcas = Attribute::where('tipo', 'marca')->pluck('valor', 'valor');
        $this->dispositivos = Attribute::where('tipo', 'Tipo de equipo')->pluck('valor', 'valor');
        $this->sistemas = Attribute::where('tipo', 'S.O.')->pluck('valor', 'valor');
        $this->almacenamientos = Attribute::where('tipo', 'Almacenamiento')->pluck('valor', 'valor');
        $this->procesadores = Attribute::where('tipo', 'Procesador')->pluck('valor', 'valor');
        $this->memorias = Attribute::where('tipo', 'RAM')->pluck('valor', 'valor');
        $this->versionesOffice = Attribute::where('tipo', 'Office')->pluck('valor', 'valor');
    }

    public function updatedDispositivo($value)
    {
        $mostrar = Attribute::where('tipo', 'Tipo de equipo')->where('valor', $value)->first();

        switch (strtoupper($mostrar->valor ?? '')) {
            case 'ALL-IN-ONE':
                $this->mostraropciones = 1;
                break;
            case 'LAPTOP':
                $this->mostraropciones = 2;
                break;
            case 'ESCRITORIO':
                $this->mostraropciones = 3;
                break;
            case 'TABLET':
                $this->mostraropciones = 4;
                break;
            default:
                $this->mostraropciones = 0;
                break;
        }
    }

    public function closemodal()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.asignar-modal');
    }
}
