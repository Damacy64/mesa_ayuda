<?php

namespace App\Livewire\Support;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TicketsSupport extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = '';
    public $sortDirection = 'asc';
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

    #[On('ticketActualizado')]
    public function render()
    {
        // Obtener el ID del técnico autenticado
        $supportId = Auth::user()->support->id;

        $tickets = Ticket::with(['usuario.user', 'usuario.area', 'usuario.location'])
            ->where('tecnico_id', $supportId)
            ->when($this->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('folio', 'like', "%{$search}%")
                        ->orWhereHas(
                            'usuario.user',
                            fn($q2) =>
                            $q2->where('name', 'like', "%{$search}%")
                        )
                        ->orWhereHas(
                            'usuario.area',
                            fn($q2) =>
                            $q2->where('nombre', 'like', "%{$search}%")
                        )
                        ->orWhereHas(
                            'usuario.location',
                            fn($q2) =>
                            $q2->where('piso', 'like', "%{$search}%")
                        )
                        ->orWhere('prioridad_id', 'like', "%{$search}%")
                        ->orWhere('estatus_id',  'like', "%{$search}%");
                });
            })
            ->orderBy($this->sortField ?: 'created_at', $this->sortDirection)
            ->paginate(5);
        
        // Retornar la vista con los tickets filtrados
        return view('livewire.support.tickets-support', compact('tickets'));
    }

    public function abrirModal($ticket)
    {
        $this->dispatch('abrir-modal', $ticket);
    }
}
