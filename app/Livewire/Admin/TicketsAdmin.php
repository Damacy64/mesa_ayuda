<?php

namespace App\Livewire\Admin;

use App\Models\Ticket;
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

    #[On('reasignado')]
    public function render()
    {
        $tickets = Ticket::with(['usuario.user', 'tecnico', 'opciones'])
            ->when($this->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->Where('created_at', 'like', "%{$search}%")
                        ->orWhere('prioridad_id', 'like', "%{$search}%")
                        ->orWhere('estatus_id', 'like', "%{$search}%")

                        // Buscar por numero de empleado
                        ->orWhereHas(
                            'usuario.user',
                            fn($q2) =>
                            $q2->where('employer_number', 'like', "%{$search}%")
                        )
                        // Buscar por nombre de usuario final
                        ->orWhereHas(
                            'usuario.user',
                            fn($q2) =>
                            $q2->where('name', 'like', "%{$search}%")
                        )

                        // Buscar por nombre del técnico
                        ->orWhereHas(
                            'tecnico.user',
                            fn($q2) =>
                            $q2->where('name', 'like', "%{$search}%")
                        )

                        // Buscar en cualquier opción (categoria y falla)
                        ->orWhereHas(
                            'opciones',
                            fn($q2) =>
                            $q2->where('valor', 'like', "%{$search}%")
                        );
                });
            })
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('livewire.admin.tickets-admin', compact('tickets'));
    }

    public function abrirModal($ticket)
    {
        $this->dispatch('abrir-revision-modal', $ticket);
    }

    public function cerrarTicket($folio){
        $ticket = Ticket::findorFail($folio);
        $valorAnterior = $ticket->estatus_id;
        $ticket->update(['estatus_id' => 'CERRADO']);

        DB::table('ticket_history')->insert([
            'ticket_id' => $ticket->folio,
            'campo_modificado' => 'estatus_id',
            'valor_anterior' => $valorAnterior,
            'valor_nuevo' => 'CERRADO',
            'fecha_cambio' => now(),
        ]);
    }

    public function abrirHistorial($ticket)
    {
        $this->dispatch('abrir-historial-modal', $ticket);
    }


}
