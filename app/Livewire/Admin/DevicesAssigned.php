<?php

namespace App\Livewire\Admin;

use App\Models\Computer;
use App\Models\ComputerUserFinal;
use Livewire\Attributes\On;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class DevicesAssigned extends Component
{
    use WithPagination;
    public $search = '';
    public $sortField = '';
    public $sortDirection = 'asc';
    public $id;
    public $marca;


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }   
        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function asignarModal()
    {
        $this->dispatch('asignar-modal');
    }

    public function detalles($id)
    {
        $this->dispatch('detalles-modal', ['id' => $id]);
    }

    public function historial($id)
    {
        $this->dispatch('historial-modal', ['id' => $id]);
    }
    
    public function eliminar($id)
    {
        $equipo = Computer::find($id);
        if ($equipo) {
            $equipo->delete();
        }
        $this->dispatch('reasignado');
    }

     // esto es para cuando lo descargue pdf
   
    public function exportarPDF($id)
    {
        $equipo = Computer::with('atributos')->where('numero_serie', $id)->first();
        $usuario = ComputerUserFinal::where('equipo_numero_serie', $id)->first();

        $data = [
            'TipoDispositivo' => $equipo->TipoDispositivo,
            'marca' => $equipo->marca,
            'modelo' => $equipo->modelo,
            'numero_inventario' => $equipo->numero_inventario,
            'numero_serie' => $equipo->numero_serie,    
            'procesador' => $equipo->version_procesador,
            'RAM' => $equipo->RAM,
            'almacenamiento' => $equipo->almacenamiento,
            'usuario' => Str::title($usuario->user->name),
            'apellido_p' => Str::title($usuario->user->last_name_p),
            'apellido_m' => Str::title($usuario->user->last_name_m),
            'fecha_asignacion' => $usuario->fecha_asignacion,
            'empleado_id' => $usuario->user->employer_number,

        ];

        $pdf = Pdf::loadView('livewire.admin.formato', $data);
       return response()->streamDownload(function () use ($pdf) {
         echo $pdf->stream();
        }, 'Formato.pdf');

    }

    #[On('reasignado')]
    public function render()
    {
        $computers = ComputerUserFinal::with(['equipo.atributos', 'userFinal.user', 'userFinal.area', 'userFinal.location'])
        ->when($this->search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->Where('created_at', 'like', "%{$search}%") // Buscar por fecha de creación
                    ->orWhere('updated_at', 'like', "%{$search}%") // Buscar por fecha de actualización

                    // Buscar por nombre de usuario
                    ->orWhereHas(
                        'userFinal.user',
                        fn($q2) =>
                        $q2->where('name', 'like', "%{$search}%")
                    )

                    // Buscar por área del usuario
                    ->orWhereHas(
                        'userFinal.area',
                        fn($q2) =>
                        $q2->where('nombre', 'like', "%{$search}%")
                    )

                    // Buscar por ubicación del usuario
                    ->orWhereHas(
                        'userFinal.location',
                        fn($q2) =>
                        $q2->where('piso', 'like', "%{$search}%")
                    )

                    // Buscar por datos del equipo
                    ->orWhereHas(
                        'equipo',
                        fn($q2) =>
                        $q2->where('numero_inventario', 'like', "%{$search}%")
                            ->orWhere('numero_serie', 'like', "%{$search}%")
                            ->orWhere('modelo', 'like', "%{$search}%")
                    )

                    // Buscar por atributos del equipo
                    ->orWhereHas(
                        'equipo.atributos',
                        fn($q2) =>
                        $q2->where('atributo_tipo', 'like', "%{$search}%")
                            ->orWhere('valor', 'like', "%{$search}%")
                    );
            });
        })
            ->orderBy($this->sortField ?: 'fecha_asignacion', $this->sortDirection)
            ->paginate(15);

        return view('livewire.admin.devices-assigned', compact('computers'));
    }
}
