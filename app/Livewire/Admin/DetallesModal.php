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
    public $usuario;
    public $atributos = [];
    public $usuarios = [];
    public $ram = [];

    protected $rules = [
        'usuario' => ['required', 'exists:users,id']
    ];

    #[On('detalles-modal')]
    public function abrir($id)
    {
        // Validar el ID recibido
        $this->id = is_array($id) && isset($id['id']) ? $id['id'] : null;

        // Cargar el equipo y sus atributos
        $this->equipo = Computer::with('atributos')->find($this->id);

        if ($this->equipo) {
            $this->atributos = $this->equipo->atributos->map(function ($atributo) {
                return [
                    'tipo' => $atributo->pivot->atributo_tipo,
                    'valor' => $atributo->valor,
                ];
            })->toArray();
        }

        $this->open = true;
    }

    public function cerrar()
    {
        $this->open = false;
        $this->id = null;
        $this->resetExcept('usuarios');
        $this->resetValidation();
    }

    public function asignarUsuario()
    {
        $this->validate();


        $registro = ComputerUserFinal::where('equipo_id', $this->id)->first();
        if ($registro) {
            // Asignar el usuario al equipo
            $registro->update(['user_final_id' => $this->usuario]);
        }

        // Cerrar el modal
        $this->cerrar();

        // Emitir un evento para actualizar la lista de equipos
        $this->dispatch('reasignado');
    }

    

    public function mount()
    {
        $this->usuarios = User::all();
        $this->ram = Attribute::where('tipo', 'RAM')->pluck('valor', 'valor');
    }

    public function render()
    {
        return view('livewire.admin.detalles-modal');
    }
}
