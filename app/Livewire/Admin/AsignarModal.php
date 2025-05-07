<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Attribute;
use Livewire\Component;
use App\Models\Option;
use App\Models\Attributable;
use Livewire\Attributes\On;
use App\Models\Computer;
use Illuminate\Support\Facades\DB;

class AsignarModal extends Component    
        {
            public $open = false;
        
            #[On('abrir-modal')]
            public function abrir()
            {
                $this->open = true;
            }        
           
                public $users;
                public $atributo_marca;
                public $tipoDispositivos;
                public $atributo_tipo;

                public $opcionesNivel2 = [];
            
                public $equipoSeleccionado = [
                    'usuario_id' => '',
                    'inventario' => '',
                    'serie' => '',
                    'modelo' => '',
                    'marca' => '',
                    'direccion_ip' => '',
                    'servicio_internet' => '',
                ];
            
                public $mostraropciones = null;
                public $tipo = null;
            
                public function mount()
                {
                    $this->users = User::all();
                    $this->atributo_marca = Attribute::where('atributable_type', 'Computer')
                        ->whereHas('tipo', function ($query) {
                            $query->where('nombre', 'Marca');
                        })->get();
            
                    $this->tipoDispositivos = Option::where('nivel', 1)->get();
                }
            
                public function updatedMostraropciones($nivel)
                {
                    $this->opcionesNivel2 = Option::where('nivel', 2)
                        ->where('parent_id', $nivel)
                        ->get();
                }
            
                public function guardarTicket()
                {
                    $this->validate([
                        'equipoSeleccionado.usuario_id' => 'required|exists:users,id',
                        'equipoSeleccionado.inventario' => 'required|max:10',
                        'equipoSeleccionado.serie' => 'required|max:10',
                        'equipoSeleccionado.modelo' => 'required|max:50',
                        'equipoSeleccionado.marca' => 'required|exists:attributes,id',
                        'equipoSeleccionado.direccion_ip' => 'required|ip',
                        'equipoSeleccionado.servicio_internet' => 'required|max:35',
                    ]);
            
                    $computadora = Computer::create([
                        'user_final_id' => $this->equipoSeleccionado['usuario_id'],
                        'numero_inventario' => $this->equipoSeleccionado['inventario'],
                        'numero_serie' => $this->equipoSeleccionado['serie'],
                        'modelo' => $this->equipoSeleccionado['modelo'],
                        'direccion_ip' => $this->equipoSeleccionado['direccion_ip'],
                        'servicio_internet' => $this->equipoSeleccionado['servicio_internet'],
                    ]);
            
                    $computadora->attributes()->attach($this->equipoSeleccionado['marca']); // Marca
            
                    session()->flash('message', 'Equipo asignado correctamente.');
                    $this->reset();
                }
                public function closemodal()
                {
                    $this->open = false;
                    $this->resetExcept('users', 'atributo_tipo', 'tipo_dispositivos');
                }
        
                public function render()
                {
                    return view('livewire.admin.asignar-modal', [
                        'users' => $this->users,
                        'atributo_tipo' => $this->atributo_marca,
                        'tipo' => $this->tipoDispositivos,
                        'subtipos' => $this->opcionesNivel2,
                    ]);
                }
            }
            