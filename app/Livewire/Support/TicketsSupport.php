<?php

namespace App\Livewire\Support;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TicketsSupport extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $tickets = DB::table('tickets as t')
            ->join('user_finals as uf', 't.usuario_id', '=', 'uf.id')
            ->join('users as u', 'uf.empleado_id', '=', 'u.id')
            ->join('areas as a', 'uf.area_id', '=', 'a.nombre')
            ->join('locations as l', 'uf.ubicacion_id', '=', 'l.piso')
            ->select(
                't.folio',
                'u.name as nombre_usuario',
                'a.nombre as area',
                'l.piso as ubicacion',
                't.created_at as fecha_creacion',
                't.prioridad_id as prioridad',
                't.estatus_id as estatus'
            )
            ->when($this->search, function ($query) {
                $query->where('t.folio', 'like', '%' . $this->search . '%')
                    ->orWhere('u.name', 'like', '%' . $this->search . '%')
                    ->orWhere('a.nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('l.piso', 'like', '%' . $this->search . '%')
                    ->orWhere('t.prioridad_id', 'like', '%' . $this->search . '%')
                    ->orWhere('t.estatus_id', 'like', '%' . $this->search . '%');
            })
            ->orderByDesc('t.created_at')
            ->paginate(5);

        return view('livewire.support.tickets-support', compact('tickets'));
    }

    #[On('abrir-modal')]
    public function abrirModal()
    {
        return view('auth.login');//esto borrarlo
    }
}
