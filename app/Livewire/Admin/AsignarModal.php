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
    public $inventario = null;
    public $serie = null;
    public $modelo = null;
    public $direccionIp = null;
    public $internet = null;
    public $flash = null;
    public $serieMonitor = null;
    public $serieTeclado = null;
    public $serieMouse = null;
    public $versionProcesador = null;

    public $mostraropciones = 0;
    
    protected $rules = [
        'usuario' => ['required', 'exists:users,id'],
        'marca' => ['required', 'string'],
        'dispositivo' => ['required', 'string'],
        'inventario' => ['required', 'string'],
        'serie' => ['required', 'string'],
        'modelo' => ['required', 'string'],
        'direccionIp' => ['required', 'string'],
        'internet' => ['required', 'string'],
        'sistema' => [],
        'almacenamiento' => [],
        'procesador' => [],
        'memoria' => [],
        'versionOffice' => [],
        'flash' => [],
        'serieMonitor' => [],
        'serieTeclado' => [],
        'serieMouse' => [],
        'versionProcesador' => [],
    ];

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
        $mostrar = Attribute::where('tipo', 'Tipo de equipo')->where('valor', strtoupper($value))->first();

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

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName, $this->validaciones());
    // }

    public function validaciones()
    {
        $rules = $this->rules;
        switch ($this->mostraropciones) {
            case 1: // ALL-IN-ONE
                $rules['sistema'] = ['required', 'string'];
                $rules['almacenamiento'] = ['required', 'string'];
                $rules['procesador'] = ['required', 'string'];
                $rules['memoria'] = ['required', 'string'];
                $rules['versionOffice'] = ['required', 'string'];
                $rules['serieTeclado'] = ['required', 'string'];
                $rules['serieMouse'] = ['required', 'string'];
                $rules['versionProcesador'] = ['required', 'string'];
                break;

            case 2: // LAPTOP
                $rules['sistema'] = ['required', 'string'];
                $rules['almacenamiento'] = ['required', 'string'];
                $rules['procesador'] = ['required', 'string'];
                $rules['memoria'] = ['required', 'string'];
                $rules['versionOffice'] = ['required', 'string'];
                $rules['versionProcesador'] = ['required', 'string'];
                break;

            case 3: // ESCRITORIO
                $rules['sistema'] = ['required', 'string'];
                $rules['almacenamiento'] = ['required', 'string'];
                $rules['memoria'] = ['required', 'string'];
                $rules['serieMonitor'] = ['required', 'string'];
                $rules['serieTeclado'] = ['required', 'string'];
                $rules['serieMouse'] = ['required', 'string'];
                $rules['versionOffice'] = ['required', 'string'];
                $rules['procesador'] = ['required', 'string'];
                $rules['versionProcesador'] = ['required', 'string'];
                break;

            case 4: // TABLET
                $rules['almacenamiento'] = ['required', 'string'];
                $rules['memoria'] = ['required', 'string'];
                $rules['flash'] = ['required', 'string'];
                $rules['versionOffice'] = ['required', 'string'];
                break;

            default:
                break;
        }

        return $rules;
    }

    public function closemodal()
    {
        $this->open = false;
        $this->resetExcept(['usuarios', 'marcas', 'dispositivos', 'sistemas', 'almacenamientos', 'procesadores', 'memorias', 'versionesOffice']);
    }

    public function asignar()
    {
        $this->validate();

        $reglasDinamicas = $this->validaciones();
        $this->validate($reglasDinamicas);
        
        $this->closemodal();
    }

    public function render()
    {
        return view('livewire.admin.asignar-modal');
    }
}
