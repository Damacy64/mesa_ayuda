<?php

namespace App\Livewire\Support;

use App\Mail\TicketActualizado;
use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateTicketModal extends Component
{

    public $open = false;
    public $ticket;
    public $estatus;
    public $status = [];
    public $descripcion;

    protected $rules = [
        'estatus' => 'required',
        'descripcion' => 'required|string|max:255',
    ];

    #[On('abrir-modal')]
    public function abrirModal($folio)
    {
        $ticket = DB::table('tickets as t')
            ->leftJoin('computers as c', 't.equipo_id', '=', 'c.numero_serie')
            ->leftJoin('ticket_opcion as to', 't.folio', '=', 'to.ticket_id')
            ->leftJoin('options as o', 'to.opcion_id', '=', 'o.id')
            ->select(
                't.folio',
                't.titulo',
                DB::raw("MAX(CASE WHEN o.nivel = 'tipo' THEN o.valor END) as equipo"),
                DB::raw("MAX(CASE WHEN o.nivel = 'falla' THEN o.valor END) as tipo_falla"),
                'c.numero_serie',
                't.descripcion'
            )
            ->where('t.folio', $folio)
            ->groupBy('t.folio', 't.titulo', 'c.modelo', 'c.numero_serie', 't.descripcion')
            ->first();

        $this->ticket = $ticket;
        $this->estatus = $ticket->estatus_id ?? null;
        $this->open = true;
    }

    public function cerrarModal()
    {
        $this->open = false;
    }

    public function actualizarTicket()
    {

        $this->validate();

        // Obtenemos el ticket por su folio
        $ticket = Ticket::where('folio', $this->ticket->folio)->first();



        // Actualizamos el estado del ticket
        if ($this->estatus == 'CERRADO') {
            if ($ticket) {
                $ticket->update([
                    'estatus_id' => $this->estatus,
                    'solucion' => $this->descripcion,
                    'fecha_termino' => now(),
                ]);
            }
        } else {
            if ($ticket) {
                $ticket->update([
                    'estatus_id' => $this->estatus,
                    'solucion' => $this->descripcion,
                ]);
            }
        }
        $this->reset(['open', 'ticket', 'estatus', 'descripcion']);

        $ticket = $ticket = Ticket::with('opciones')->find($ticket->folio);
        // Enviamos un correo al usuario
        Mail::to($ticket->usuario->user->email)->send(new TicketActualizado($ticket));

        $this->dispatch('ticketActualizado', $ticket->id);
    }

    public function mount()
    {
        $this->status = Status::all();
    }

    public function render()
    {
        $tickets = DB::table('tickets as t')
            ->leftJoin('computers as c', 't.equipo_id', '=', 'c.numero_serie')
            ->leftJoin('ticket_opcion as to', 't.folio', '=', 'to.ticket_id')
            ->leftJoin('options as o', 'to.opcion_id', '=', 'o.id')
            ->select(
                't.folio',
                DB::raw("MAX(CASE WHEN o.nivel = 'tipo_ticket' THEN o.valor END) as tipo_ticket"),
                DB::raw("MAX(CASE WHEN o.nivel = 'tipo_falla' THEN o.valor END) as tipo_falla"),
                'c.modelo as equipo',
                'c.numero_serie',
                't.descripcion'
            )->groupBy('t.folio', 'c.modelo', 'c.numero_serie', 't.descripcion')->get();

        return view('livewire.support.update-ticket-modal', compact('tickets'));
    }
}
