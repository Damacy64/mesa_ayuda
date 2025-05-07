<?php

namespace App\Livewire\Admin;


use App\Models\Ticket;
use App\Models\Computer;
use App\Models\ComputerUserFinal;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class DevicesAssigned extends Component
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
                    $q->where('folio', 'like', "%{$search}%")
                        ->orWhere('created_at', 'like', "%{$search}%")
                        ->orWhere('prioridad_id', 'like', "%{$search}%")
                        ->orWhere('estatus_id', 'like', "%{$search}%")

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

        return view('livewire.admin.devices-assigned', compact('tickets'));
    }
}
