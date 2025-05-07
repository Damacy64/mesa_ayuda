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
        $computers = ComputerUserFinal::with(['equipo', 'userFinal'])
            ->when($this->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('numero_serie', 'like', "%{$search}%")
                        ->orWhere('created_at', 'like', "%{$search}%")
                        ->orWhere('updated_at', 'like', "%{$search}%")

                        // Buscar por nombre de usuario final
                        ->orWhereHas(
                            'userFinal.user',
                            fn($q2) =>
                            $q2->where('name', 'like', "%{$search}%")
                        );
                });
            })
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('livewire.admin.devices-assigned', compact('computers'));
    }
}
