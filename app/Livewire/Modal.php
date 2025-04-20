<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Ticket;
use Livewire\Component;

class Modal extends Component
{

    public $open = true;
    public $categorias = [];
    public $tipos = [];
    public $componentes = [];
    public $fallas = [];

    public $categoria = null;
    public $tipo = null;
    public $componente = null;
    public $falla = null;

    public $mostraropciones = 1;

    public function mount()
    {
        $this->categorias = Option::where('nivel', 'categoria')->get();
    }

    public function updatedCategoria($value)
    {
        $this->tipos = Option::where('parent_id', $value)->get();
        $this->tipo = '';
        $this->componentes = [];
        $this->componente = '';
        $this->fallas = [];
        $this->falla = '';

        $mostrar = Option::find($value)->valor;

        switch (strtoupper($mostrar)) {
            case 'CÓMPUTO':
                $this->mostraropciones = 4; // categoría → tipo → componente → falla
                break;
            case 'IMPRESIÓN':
                $this->mostraropciones = 3; // categoría → tipo → falla
                break;
            case 'PROGRAMACIÓN DE EVENTOS':
                $this->mostraropciones = 2; // categoría → tipo
                break;
            default:
                $this->mostraropciones = 4;
        }
    }

    public function updatedTipo($value)
    {
        $this->componentes = Option::where('parent_id', $value)->get();
        $this->componente = null;
        $this->fallas = [];
        $this->falla = null;
    }
    public function updatedComponente($value)
    {
        $this->fallas = Option::where('parent_id', $value)->get();
        $this->falla = null;
    }

    public function render()
    {
        return view('livewire.modal');
    }

    public function closemodal()
    {
        $this->open = false;  
    }

    protected $rules = [
        'categoria' => ['required', 'exists:options,id'],
        'tipo' => ['required', 'exists:options,id'],
        'componente' => [],
        'falla' => [],
    ];

    public function guardarTicket()
    {
        $rules = $this->rules;
        if ($this->mostraropciones >= 3) {
            $rules['componente'] = ['required', 'exists:options,id'];
        } else {
            $rules['componente'] = ['nullable'];
        }

        if ($this->mostraropciones >= 4) {
            $rules['falla'] = ['required', 'exists:option,id'];
        } else {
            $rules['falla'] = ['nullable'];
        }

        $validar = $this->validate($rules);

        $ticket = Ticket::create([
            'user_id' => auth()->id,
            'categoria' => $validar['categoria'],
            'tipo' => $validar['tipo'],
            'componente' => $validar['componente'],
            'falla' => $validar['falla'],
        ]);
    }
}
