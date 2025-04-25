<?php

namespace App\Livewire\User;

use App\Mail\TicketCreado;
use App\Models\Option;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\Component;

class Modal extends Component
{

    public $open = false;
    public $categorias = [];
    public $tipos = [];
    public $componentes = [];
    public $fallas = [];
    public $equipos = [];

    public $categoria = null;
    public $tipo = null;
    public $componente = null;
    public $falla = null;
    public $equipoSeleccionado;
    public $descripcion = '';

    public $mostraropciones = 1;
    public $mostrarDispositivos = false;

    protected $rules = [
        'categoria' => ['required', 'exists:options,id'],
        'tipo' => ['required', 'exists:options,id'],
        'componente' => [],
        'falla' => [],
        'equipoSeleccionado' => ['required'],
        'descripcion' => ['required', 'string', 'max:255'],
    ];

    public function mount($equipos)
    {
        $this->categorias = Option::where('nivel', 'categoria')->get();
        $this->equipos = $equipos;
    }

    #[On('abrir-modal')]
    public function abrir()
    {
        $this->open = true;
    }

    #[On('equipo-seleccionado')]
    public function setEquipoSeleccionado(array $value)
    {
        $this->equipoSeleccionado = $value;
    }

    public function updatedCategoria($value)
    {
        $this->tipos = Option::where('parent_id', $value)->get();
        $this->tipo = '';
        $this->componentes = [];
        $this->componente = '';
        $this->fallas = [];
        $this->falla = '';

        $mostrar = Option::find($value)->valor ?? '';

        switch (strtoupper($mostrar)) {
            case 'CÓMPUTO':
                $this->mostraropciones = 4; // categoría → tipo → componente → falla
                $this->mostrarDispositivos = ($value == 1);
                break;
            case 'IMPRESIÓN':
                $this->mostraropciones = 3; // categoría → tipo → falla
                $this->mostrarDispositivos = false;
                break;
            case 'PROGRAMACIÓN DE EVENTOS':
                $this->mostraropciones = 2; // categoría → tipo
                $this->mostrarDispositivos = false;
                break;
            default:
                $this->mostraropciones = 1;
                $this->mostrarDispositivos = false;
        }
    }

    public function updatedTipo($value)
    {
        $this->componentes = Option::where('parent_id', $value)->get();
        $this->componente = null;
        $this->fallas = [];
        $this->falla = null;

        $mostrar = Option::find($value)->valor ?? '';
        switch (strtoupper($mostrar)){
            case 'TABLET':
                $this->mostraropciones = 3;
                break;
        }
    }
    public function updatedComponente($value)
    {
        $this->fallas = Option::where('parent_id', $value)->get();
        $this->falla = null;
    }

    public function render()
    {
        return view('livewire.user.modal');
    }

    public function closemodal()
    {
        $this->open = false;
    }

    public function guardarTicket()
    {
        $rules = $this->rules;

        $categoriaSeleccionada = Option::find($this->categoria);
        if (strtoupper($categoriaSeleccionada->valor ?? '') === 'PROGRAMACIÓN DE EVENTOS' || strtoupper($categoriaSeleccionada->valor ?? '') === 'IMPRESIÓN') {
            $rules['equipoSeleccionado'] = ['nullable'];
        } else {
            $rules['equipoSeleccionado'] = ['required'];
        }

        if ($this->mostraropciones >= 3) {
            $rules['componente'] = ['required', 'exists:options,id'];
        } else {
            $rules['componente'] = ['nullable'];
        }

        if ($this->mostraropciones >= 4) {
            $rules['falla'] = ['required', 'exists:options,id'];
        } else {
            $rules['falla'] = ['nullable'];
        }

        $this->validate($rules);

        // Validar que dispositivo no tenga un ticket abierto
        $ticketAbierto = Ticket::where('equipo_id', $this->equipoSeleccionado)
            ->where('estatus_id', 'ABIERTO')
            ->exists();

        if ($ticketAbierto) {
            $this->addError('equipo', 'El dispositivo ya tiene un ticket abierto.');
            return;
        }

        // Crear el ticket
        $ticket = Ticket::create([
            'usuario_id' => Auth::user()->id,
            'tecnico_id' => 1,
            'prioridad_id' => 'BAJA',
            'estatus_id' => 'ABIERTO',
            'equipo_id' => $this->equipoSeleccionado['numero_serie'] ?? null,
            'titulo' => Option::find($this->categoria)->valor,
            'descripcion' => $this->descripcion,
        ]);

        // Guardar las opciones seleccionadas
        $opciones = collect([
            $this->categoria,
            $this->tipo,
            $this->componente,
            $this->falla,
        ])->filter();

        $ticket->opciones()->attach($opciones);

        // Enviar correo al usuario
        Mail::to(Auth::user()->email)->send(new TicketCreado($ticket));

        // Resetear los campos
        $this->open = false;
        $this->reset(['categoria', 'tipo', 'componente', 'falla', 'mostraropciones', 'descripcion']);
        $this->dispatch('ticketCreated', $ticket->id);
    }
}
