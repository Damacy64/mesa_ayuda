<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Computer;
use Livewire\Component;
use App\Models\Option;
use App\Models\Attributable;
use App\Models\Componente;
use Livewire\Attributes\On;


class AsignarModal extends Component    
        {
            public $open = false;
        
    #[On('abrir-modal')]
    public function abrir()
    {
        $this->open = true;
    }

            // Inputs principales
            public $equipoSeleccionado = [
                'usuario_id' => '',
                'marca' => '',
            ];
        
            public $inventario, $serie, $modelo, $direccion_ip, $servicio_internet ,$atributo_tipo;
        
            // Jerarquía de opciones
            public $nivel1, $nivel2, $nivel3, $nivel4;
            public $opcionesNivel1 = [], $opcionesNivel2 = [], $opcionesNivel3 = [], $opcionesNivel4 = [];
        
            public $users;
        
            public function mount()
            {
                $this->opcionesNivel1 = Option::where('nivel', 1)->get();
                $this->users = User::all();
            }
        
            public function updatedNivel1($value)
            {
                $this->nivel2 = $this->nivel3 = $this->nivel4 = null;
                $this->opcionesNivel2 = Option::where('parent_id', $value)->get();
                $this->opcionesNivel3 = [];
                $this->opcionesNivel4 = [];
            }
        
            public function updatedNivel2($value)
            {
                $this->nivel3 = $this->nivel4 = null;
                $this->opcionesNivel3 = Option::where('parent_id', $value)->get();
                $this->opcionesNivel4 = [];
            }
        
            public function updatedNivel3($value)
            {
                $this->nivel4 = null;
                $this->opcionesNivel4 = Option::where('parent_id', $value)->get();
            }
        
            public function guardarTicket()
            {
                $this->validate([
                    'equipoSeleccionado.usuario_id' => 'required',
                    'inventario' => 'required|max:10',
                    'serie' => 'required|max:10',
                    'modelo' => 'required|max:50',
                    'equipoSeleccionado.marca' => 'required',
                    'direccion_ip' => 'required|ip',
                    'servicio_internet' => 'required|max:35',
                    'nivel1' => 'required',
                    // puedes validar los demás niveles si son obligatorios
                ]);
        
                $computer = Computer::create([
                    'usuario_id' => $this->equipoSeleccionado['usuario_id'],
                    'numero_inventario' => $this->inventario,
                    'numero_serie' => $this->serie,
                    'modelo' => $this->modelo,
                    'marca_id' => $this->equipoSeleccionado['marca'],
                    'direccion_ip' => $this->direccion_ip,
                    'servicio_internet' => $this->servicio_internet,
                ]);
        
                // Relacionar opciones (si aplica)
                $opciones = collect([$this->nivel1, $this->nivel2, $this->nivel3, $this->nivel4])->filter();
                $computer->attributes()->sync($opciones);
        
                session()->flash('message', 'Dispositivo asignado correctamente.');
                $this->reset();
                $this->open = false;
            }
        
            public function closemodal()
            {
                $this->reset();
                $this->open = false;
            }
        
    public function render()
    {
        return view('livewire.admin.asignar-modal');
    }
}
