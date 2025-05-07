<?php

namespace App\Livewire\Admin;

use App\Models\UserFinal;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $totalUsuarios;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function eliminarUsuario($id)
    {
        $usuario = UserFinal::find($id);
        if ($usuario) {
            $usuario->update(['estado' => 'DESHABILITADO']);
            $this->dispatch('eliminarUsuario');
        }
    }

    #[On('eliminarUsuario')]
    public function render()
    {
        $usuarios = UserFinal::with(['user', 'location', 'area'])
            ->when($this->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('empleado_id', 'like', "%{$search}%") // Buscar por número de empleado
                        ->orWhereHas('user', function ($q2) use ($search) {
                            $q2->where('name', 'like', "%{$search}%") // Buscar por nombre
                                ->orWhere('email', 'like', "%{$search}%"); // Buscar por correo electrónico
                        })
                        ->orWhereHas('area', function ($q2) use ($search) {
                            $q2->where('nombre', 'like', "%{$search}%"); // Buscar por área
                        })
                        ->orWhereHas('location', function ($q2) use ($search) {
                            $q2->where('piso', 'like', "%{$search}%"); // Buscar por ubicación
                        })
                        ->orWhereHas('user', fn($q2) =>
                            $q2->where('employer_number', 'like', "%{$search}%")
                        );
                });
            })
            ->orderByDesc('empleado_id')
            ->paginate(5);
        //dd($usuarios);
        $this->totalUsuarios = UserFinal::where('estado', 'HABILITADO')->count();
        return view('livewire.admin.users', compact('usuarios'));
    }
}
