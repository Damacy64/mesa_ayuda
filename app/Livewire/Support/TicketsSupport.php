<?php

namespace App\Livewire\Support;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TicketsSupport extends Component
{
    use WithPagination;

    public $tickets;

    // Configuración para que funcione con Tailwind CSS
    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        // Puedes eliminar esta propiedad si no la necesitas
        $this->tickets = [];
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
            ->orderByDesc('t.created_at')
            ->paginate(10); // Cambia el número de elementos por página según lo necesites

        return view('livewire.support.tickets-support', compact('tickets'));
    }
}
