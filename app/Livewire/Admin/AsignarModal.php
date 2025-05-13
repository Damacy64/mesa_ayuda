<?php

namespace App\Livewire\Admin;

use App\Mail\AsignacionEquipo;
use App\Models\Attribute;
use App\Models\Computer;
use App\Models\ComputerUserFinal;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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
        $this->resetValidation();
    }

    public function asignar()
    {
        $this->validate($this->validaciones());

        // Guardar el equipo
        $computadora = Computer::create([
            'numero_serie' => $this->serie,
            'numero_inventario' => $this->inventario,
            'modelo' => $this->modelo,
            'direccion_ip' => $this->direccionIp,
            'internet' => $this->internet,
            'serie_monitor' => $this->serieMonitor,
            'serie_teclado' => $this->serieTeclado,
            'serie_mouse' => $this->serieMouse,
            'version_procesador' => $this->versionProcesador,
        ]);

        // Construir los atributos dinámicamente en función del dispositivo seleccionado
        $atributos = collect();

        // Atributos comunes
        $atributos->push(['tipo' => 'marca', 'valor' => $this->marca]);
        $atributos->push(['tipo' => 'Tipo de equipo', 'valor' => $this->dispositivo]);

        // Atributos específicos según el dispositivo
        switch ($this->mostraropciones) {
            case 1: // ALL-IN-ONE
                $atributos->push(['tipo' => 'S.O.', 'valor' => $this->sistema]);
                $atributos->push(['tipo' => 'Almacenamiento', 'valor' => $this->almacenamiento]);
                $atributos->push(['tipo' => 'Procesador', 'valor' => $this->procesador]);
                $atributos->push(['tipo' => 'RAM', 'valor' => $this->memoria]);
                $atributos->push(['tipo' => 'Office', 'valor' => $this->versionOffice]);
                break;

            case 2: // LAPTOP
                $atributos->push(['tipo' => 'S.O.', 'valor' => $this->sistema]);
                $atributos->push(['tipo' => 'Almacenamiento', 'valor' => $this->almacenamiento]);
                $atributos->push(['tipo' => 'Procesador', 'valor' => $this->procesador]);
                $atributos->push(['tipo' => 'RAM', 'valor' => $this->memoria]);
                $atributos->push(['tipo' => 'Office', 'valor' => $this->versionOffice]);
                break;

            case 3: // ESCRITORIO
                $atributos->push(['tipo' => 'S.O.', 'valor' => $this->sistema]);
                $atributos->push(['tipo' => 'Almacenamiento', 'valor' => $this->almacenamiento]);
                $atributos->push(['tipo' => 'RAM', 'valor' => $this->memoria]);
                $atributos->push(['tipo' => 'Office', 'valor' => $this->versionOffice]);
                $atributos->push(['tipo' => 'Procesador', 'valor' => $this->procesador]);
                break;

            case 4: // TABLET
                $atributos->push(['tipo' => 'Almacenamiento', 'valor' => $this->almacenamiento]);
                $atributos->push(['tipo' => 'RAM', 'valor' => $this->memoria]);
                $atributos->push(['tipo' => 'Flash', 'valor' => $this->flash]);
                $atributos->push(['tipo' => 'Office', 'valor' => $this->versionOffice]);
                break;
        }

        // Guardar los atributos en la tabla attributable
        foreach ($atributos as $atributo) {
            $computadora->atributos()->attach($atributo['valor'], ['atributo_tipo' => $atributo['tipo']]);
        }

        // Relacionar el equipo con el usuario
        ComputerUserFinal::create([
            'user_final_id' => $this->usuario,
            'equipo_id' => $computadora->numero_serie,
        ]);
        
        $usuario = User::find($this->usuario);
        // Enviar correo al usuario
        Mail::to($usuario->email)->send(new AsignacionEquipo($computadora, $usuario));

        $this->closemodal();
        $this->dispatch('reasignado');
    }

    public function render()
    {
        return view('livewire.admin.asignar-modal');
    }
}
