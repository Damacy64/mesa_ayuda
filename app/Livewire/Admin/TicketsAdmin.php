<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TicketsAdmin extends Component
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
        ->join('support as s', 't.tecnico_id', '=', 's.id')
        ->join('users as u', 'uf.empleado_id', '=', 'u.id')
        ->join('ticket_opcion as to', 't.folio', '=', 'to.ticket_id')
        ->join('options as o', 'to.opcion_id', '=', 'o.id')
        ->select(
            't.folio',
            'u.name as nombre_usuario',
            DB::raw("MAX(CASE WHEN o.nivel = 'tipo_ticket' THEN o.valor END) as tipo_ticket"),
            DB::raw("MAX(CASE WHEN o.nivel = 'tipo_falla' THEN o.valor END) as tipo_falla"),
            't.created_at as fecha_creacion',
            't.prioridad_id as prioridad',
            't.estatus_id as estatus',
            's.empleado_id as tecnico'
        )
        ->groupBy('t.folio', 'u.name', 't.created_at', 't.prioridad_id', 't.estatus_id', 's.empleado_id')
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

        return view('livewire.admin.tickets-admin', compact('tickets'));
    }

}
