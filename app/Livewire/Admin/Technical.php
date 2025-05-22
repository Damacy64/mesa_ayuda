<?php

namespace App\Livewire\Admin;

use App\Models\Support;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Technical extends Component
{
    use WithPagination;

    public $totalTecnicos;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function agregarTecnicoModal()
    {
        $this->dispatch('agregarTecnicoModal');
    }

    public function deshabilitarTecnico($id)
    {
        $tecnico = Support::find($id);
        if ($tecnico) {
            $tecnico->update(['estado' => 'DESHABILITADO']);
            $this->dispatch('tablaTecnicos');
        }
    }

    public function habilitarTecnico($id)
    {
        $tecnico = Support::find($id);
        if ($tecnico) {
            $tecnico->update(['estado' => 'HABILITADO']);
            $this->dispatch('tablaTecnicos');
        }
    }

    public function eliminarTecnico($id)
    {
        $tecnico = Support::find($id);
        if ($tecnico) {
            $tecnico->update(['estado' => 'ELIMINADO']);
            $this->dispatch('tablaTecnicos');
        }
    }

    #[On('tablaTecnicos')]
    public function render()
    {
        $tecnicos = Support::with('user')
            ->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('employer_number', 'like', '%' . $this->search . '%');
            })
            ->where('estado', '!=', 'ELIMINADO')
            ->orderByDesc('empleado_id')
            ->paginate(15);
        $this->totalTecnicos = Support::where('estado', '!=', 'ELIMINADO')->count();
        return view('livewire.admin.technical', compact('tecnicos'));
    }
}
