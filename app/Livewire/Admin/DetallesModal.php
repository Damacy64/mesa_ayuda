<?php

namespace App\Livewire\Admin;

use App\Models\Attribute;
use App\Models\Computer;
use App\Models\ComputerUserFinal;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class DetallesModal extends Component
{
    public $open = false;
    public $id;
    public $equipo;

    public $atributos = [];
    public $usuarios = [];
    public $marcas = [];
    public $dispositivos = [];
    public $sistemas = [];
    public $almacenamientos = [];
    public $procesadores = [];
    public $memorias = [];
    public $versionesOffice = [];

    // Datos
    public $usuario;
    public $direccion_ip;
    public $internet;
    public $serie_monitor;
    public $serie_mouse;
    public $serie_teclado;
    public $version_procesador;
    public $memoria;
    public $almacenamiento;
    public $office;
    public $sistema_operativo;
    public $procesador;
    public $marca;

    protected $rules = [
        'usuario' => ['exists:users,id']
    ];

    #[On('detalles-modal')]
    public function abrir($id)
    {
        // Validar el ID recibido (numero_serie)
        $this->id = $id;

        // Cargar el equipo basado en el numero_serie
        $this->equipo = Computer::with('atributos')->where('numero_serie', $this->id)->first();

        if ($this->equipo) {
            // Inicializar los valores de los atributos del equipo
            $this->direccion_ip = $this->equipo->direccion_ip;
            $this->internet = $this->equipo->internet;
            $this->serie_monitor = $this->equipo->serie_monitor;
            $this->serie_mouse = $this->equipo->serie_mouse;
            $this->serie_teclado = $this->equipo->serie_teclado;
            $this->version_procesador = $this->equipo->version_procesador;

            // Cargar los valores de los atributos relacionados
            $this->almacenamiento = $this->equipo->atributos()->where('atributo_tipo', 'Almacenamiento')->first()?->pivot->atributo_valor ?? null;
            $this->marca = $this->equipo->atributos()->where('atributo_tipo', 'marca')->first()?->pivot->atributo_valor ?? null;
            $this->office = $this->equipo->atributos()->where('atributo_tipo', 'Office')->first()?->pivot->atributo_valor ?? null;
            $this->procesador = $this->equipo->atributos()->where('atributo_tipo', 'Procesador')->first()?->pivot->atributo_valor ?? null;
            $this->memoria = $this->equipo->atributos()->where('atributo_tipo', 'RAM')->first()?->pivot->atributo_valor ?? null;
            $this->sistema_operativo = $this->equipo->atributos()->where('atributo_tipo', 'S.O.')->first()?->pivot->atributo_valor ?? null;
        }

        $this->open = true;
    }

    public function cerrar()
    {
        $this->open = false;
        $this->id = null;
        $this->resetExcept('usuarios', 'marcas', 'dispositivos', 'sistemas', 'almacenamientos', 'procesadores', 'memorias', 'versionesOffice');
        $this->resetValidation();
    }

    public function asignarUsuario()
    {
        //$this->validate();

        // Actualizar información general en la tabla `computers`
        $informacionGeneral = [
            'direccion_ip' => $this->direccion_ip,
            'internet' => $this->internet,
            'serie_monitor' => $this->serie_monitor,
            'serie_mouse' => $this->serie_mouse,
            'serie_teclado' => $this->serie_teclado,
            'version_procesador' => $this->version_procesador,
        ];
        //dd($informacionGeneral);

        foreach ($informacionGeneral as $campo => $valor) {
            if ($this->equipo->$campo !== $valor) {
                $this->equipo->$campo = $valor;
            }
        }

        $this->equipo->save();

        // Actualizar atributos en la tabla `attributables`
        $atributos = [
            'Almacenamiento' => $this->almacenamiento,
            'Marca' => $this->marca,
            'Office' => $this->office,
            'Procesador' => $this->procesador,
            'RAM' => $this->memoria,
            'S.O.' => $this->sistema_operativo,
        ];

        foreach ($atributos as $tipo => $valor) {
            $atributo = Attribute::where('tipo', $tipo)->first();

            if ($atributo) {
                // Verificar si el registro ya existe en la tabla pivote
                $registroPivote = $this->equipo->atributos()->where('atributo_tipo', $tipo)->first();

                if ($registroPivote) {
                    // Actualizar el valor en la tabla pivote
                    if ($registroPivote->pivot->atributo_valor !== $valor) {
                        $this->equipo->atributos()->updateExistingPivot($atributo->id, [
                            'atributo_valor' => $valor,
                        ]);
                    }
                }
            }
        }

        // Asignar el usuario al equipo
        if (!empty($this->usuario)) {
            $registro = ComputerUserFinal::where('equipo_id', $this->id)->first();
            if ($registro && $registro->user_final_id !== $this->usuario) {
                $registro->update(['user_final_id' => $this->usuario]);
            }
        }

        // Cerrar el modal
        $this->cerrar();

        // Emitir un evento para actualizar la lista de equipos
        $this->dispatch('reasignado');
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

    public function render()
    {
        return view('livewire.admin.detalles-modal');
    }
}
