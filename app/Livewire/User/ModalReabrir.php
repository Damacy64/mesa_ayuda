<?php

namespace App\Livewire\User;

use App\Mail\reabrirTicket;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Illuminate\Support\Str;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class ModalReabrir extends Component
{
    public $open = false;
    public $folio;
    public $ticket;
    public $descripcion;

    protected $rules = [
        'descripcion' => 'required|string|max:255',
    ];

    #[On('reabrir-modal')]
    public function reabrirModal($folio)
    {
        $this->folio = $folio;
        $this->open = true;

        // Cargar los datos del ticket seleccionado
        $this->ticket = DB::table('tickets as t')
            ->leftJoin('computers as c', 't.equipo_numero_serie', '=', 'c.numero_serie')
            ->leftJoin('ticket_opcion as to', 't.folio', '=', 'to.ticket_id')
            ->leftJoin('options as o', 'to.opcion_id', '=', 'o.id')
            ->select(
                't.folio',
                't.titulo',
                'c.modelo as equipo',
                DB::raw("MAX(CASE WHEN o.nivel = 'falla' THEN o.valor END) as tipo_falla"),
                't.descripcion',
                't.solucion',
                't.equipo_numero_serie',
            )
            ->groupBy('t.folio', 't.titulo', 'c.modelo', 't.descripcion', 't.solucion', 't.equipo_numero_serie')
            ->where('t.folio', $this->folio)
            ->first();
    }

    public function cerrarModal()
    {
        // Limpiar los datos del ticket al cerrar el modal
        $this->open = false;
        $this->ticket = null;
        $this->descripcion = null;
    }

    public function render()
    {
        return view('livewire.user.modal-reabrir');
    }

    public function reabrir()
    {
        $this->validate();

        // Obtenemos el ticket por su folio
        $ticketAbrir = Ticket::where('folio', $this->folio)->first();

        // Actualizamos el estado del ticket
        if ($ticketAbrir) {
            $valorAnterior = $ticketAbrir->estatus_id;
            $ticketAbrir->update([
                'estatus_id' => 'ABIERTO',
                'descripcion' => Str::upper($this->descripcion),
            ]);

            // Registrar el cambio en el historial
            DB::table('ticket_history')->insert([
                'ticket_id' => $ticketAbrir->folio,
                'campo_modificado' => 'estatus_id',
                'valor_anterior' => $valorAnterior,
                'valor_nuevo' => 'ABIERTO',
                'fecha_cambio' => now(),
            ]);
        }

        // Enviamos una notificación al usuario
        Mail::to($ticketAbrir->usuario->user->email)->send(new reabrirTicket($ticketAbrir));

        $this->dispatch('ticketCreated');

        $this->cerrarModal();
        return redirect()->route('dashboard');
    }
}
