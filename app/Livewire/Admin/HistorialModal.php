<?php

namespace App\Livewire\Admin;

use App\Models\AttributableHistory;
use Livewire\Attributes\On;
use Livewire\Component;

class HistorialModal extends Component
{
    public $open = false;
    public $id;
    public $historial;

    #[On('historial-modal')]
    public function abrir($id)
    {
        $this->open = true;
        $this->id = is_array($id) && isset($id['id']) ? $id['id'] : $id;
        
        $this->historial = AttributableHistory::where('attributable_id', $this->id)->get();
    }

    public function cerrar()
    {
        $this->open = false;
        $this->id = null;
        $this->historial = null;
    }

    public function render()
    {
        return view('livewire.admin.historial-modal');
    }
}
