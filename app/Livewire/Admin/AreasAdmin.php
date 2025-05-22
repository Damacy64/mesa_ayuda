<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Area;
use Livewire\WithPagination;

class AreasAdmin extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function ocultar($nombre)
    {
        $area = Area::where('nombre', $nombre)->first();

        if ($area) {
            $area->visible = false;
            $area->save();
        }
    }
    public function render()
    {
        $areas = Area::where('visible', true)
            ->where(function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('descripcion', 'like', '%' . $this->search . '%');
            })
            ->orderBy('nombre')
            ->paginate(15);

        return view('livewire.admin.areas-admin', compact('areas'));
    }
}
