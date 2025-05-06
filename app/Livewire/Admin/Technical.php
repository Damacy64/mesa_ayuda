<?php

namespace App\Livewire\Admin;

use App\Models\Support;
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

    public function render()
    {
        $tecnicos = Support::with('user')->orderByDesc('empleado_id')->paginate(5);
        $this->totalTecnicos = Support::count();
        return view('livewire.admin.technical', compact('tecnicos'));
    }
}
