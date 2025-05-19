<?php

namespace App\Livewire\Support;

use App\Mail\TicketActualizado;
use App\Models\Support;
use App\Models\Status;
use Illuminate\Support\Str;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\Component;

use function Pest\Laravel\get;

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
            ->leftJoin('computers as c', 't.equipo_numero_serie', '=', 'c.numero_serie')
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
        $this->reset(['ticket', 'estatus', 'descripcion']);
        $this->open = false;
        $this->dispatch('ticketActualizado');
    }

    public function actualizarTicket()
    {

        $this->validate();

        // // Obtenemos el ticket por su folio
        $ticket = Ticket::where('folio', $this->ticket->folio)->first();

        if ($this->estatus === 'CERRADO') {
            $inicio = new \DateTime($ticket->created_at);
            $fin = new \DateTime($fechaTermino); 

            $horaEntrada = explode(':', $ticket->tecnico->hora_entrada);
            $horaSalida = explode(':', $ticket->tecnico->hora_salida);

            list($hEntrada, $mEntrada, $sEntrada) = array_pad($horaEntrada, 3, 0);
            list($hSalida, $mSalida, $sSalida) = array_pad($horaSalida, 3, 0);

            $minutosTotales = 0;

            $periodo = new \DatePeriod((clone $inicio)->setTime(0, 0), new \DateInterval('P1D'), (clone $fin)->setTime(0, 0)->modify('+1 day'));

            foreach ($periodo as $dia) {
                if (in_array($dia->format('N'), [6, 7])) continue; 

                $horaInicio = (clone $dia)->setTime($hEntrada, $mEntrada, $sEntrada);
                $horaFin = (clone $dia)->setTime($hSalida, $mSalida, $sSalida);

                $desde = max($horaInicio, $inicio);
                $hasta = min($horaFin, $fin);

                if ($desde < $hasta) {
                    $minutosTotales += ($hasta->getTimestamp() - $desde->getTimestamp()) / 60;
                }
            }

            $tiempoSolucion = sprintf('%02d%02d%02d',
                floor($minutosTotales / 60),
                $minutosTotales % 60,
                0
            );

            $ticket->update([
                'estatus_id' => $this->estatus,
                'solucion' => strtoupper($this->descripcion),
                'fecha_termino' => $fin,
                'tiempo_solucion' => $tiempoSolucion,
            ]);
    }
        $this->reset(['open', 'ticket', 'estatus', 'descripcion']);

        $ticket = Ticket::with('opciones')->find($ticket->folio);
        // Enviamos un correo al usuario
        Mail::to($ticket->usuario->user->email)->send(new TicketActualizado($ticket));

    }

    public function mount()
    {
        $this->status = Status::all();
    }

    public function render()
    {
        $tickets = Ticket::with(['equipo', 'opciones'])
            ->get()
            ->map(function (Ticket $ticket) {
                return [
                    'folio' => $ticket->folio,
                    'equipo' => $ticket->equipo->modelo ?? null,
                    'tipo_falla' => $ticket->opciones->where('nivel', 'falla')->first()->valor ?? null,
                    'descripcion' => $ticket->descripcion,
                ];
            });

        return view('livewire.support.update-ticket-modal', compact('tickets'));
    }
}
