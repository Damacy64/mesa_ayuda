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
        $this->reset(['ticket', 'estatus', 'descripcion']);
        $this->open = false;
    }

    public function actualizarTicket()
    {

         $this->validate();

        // // Obtenemos el ticket por su folio
        $ticket = Ticket::where('folio', $this->ticket->folio)->first();

            // if ($this->estatus == 'CERRADO') {
            //     $inicio = new \DateTime($ticket->created_at);
            //     $fin = new \DateTime();
            //     $hora_entrada = $ticket->hora_entrada;
            //     $hora_salida = $ticket->hora_salida;

            //     $inicioDia = clone $inicio;
            //     $inicioDia->setTime(0, 0, 0);

            //     $finDia = clone $fin;
            //     $finDia->setTime(0, 0, 0);

            //     $minutosTotales = 0;

            //     list($h, $m, $s) = array_pad(explode(':', $hora_entrada), 3, 0);
            //         $inicioDia->setTime((int)$h, (int)$m, (int)$s);

            //     list($h, $m, $s) = array_pad(explode(':', $hora_salida), 3, 0);
            //         $finDia->setTime((int)$h, (int)$m, (int)$s);

            //     $intervalo = new \DateInterval('P1D');
            //      $rango = new \DatePeriod(clone $inicio, $intervalo, (clone $fin)->modify('+1 day'));

            //     foreach ($rango as $fecha) {
            //         if (in_array($fecha->format('N'), [6, 7])) continue;  
            //         list($h, $m, $s) = array_pad(explode(':', $hora_entrada), 3, 0);
            //             $inicioDia->setTime((int)$h, (int)$m, (int)$s);

            //         list($h, $m, $s) = array_pad(explode(':', $hora_salida), 3, 0);
            //             $finDia->setTime((int)$h, (int)$m, (int)$s);
            //         $desde = max($inicioDia, $inicio);
            //         $hasta = min($finDia, $fin);

            //         if ($desde < $hasta) {
            //             $minutos = ($hasta->getTimestamp() - $desde->getTimestamp()) / 60;
            //             $minutosTotales += $minutos;
            //         }
                    
            //         }
            //         $horas = floor($minutosTotales / 60);
            //         $minutos = $minutosTotales % 60;
            //         $segundos = 0;
            //         $tiempoSolucion = sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);

            //         $ticket->update([
            //             'estatus_id' => $this->estatus,
            //             'solucion' => strtoupper($this->descripcion),
            //             'fecha_termino' => $fin,
            //             'tiempo_solucion' => $tiempoSolucion,
            //         ]);
            //     }


         
if ($this->estatus == 'CERRADO') {
    $inicio = new \DateTime($ticket->created_at);
    $fin = new \DateTime();
    dd( $ticket->tecnico->hora_entrada);
    $hora_entrada = $ticket->tecnico->hora_entrada;
    $hora_salida = $ticket->tecnico->hora_salida;

    $segundosTotales = 0;
    $intervalo = new \DateInterval('P1D');
    $rango = new \DatePeriod(clone $inicio, $intervalo, (clone $fin)->modify('+1 day'));

    foreach ($rango as $fecha) {
        if (in_array($fecha->format('N'), [6, 7])) continue;

        $rangoInicio = ($fecha->format('Y-m-d') == $inicio->format('Y-m-d')) ? max($inicio, $laboralInicio) : $laboralInicio;
        $rangoFin = ($fecha->format('Y-m-d') == $fin->format('Y-m-d')) ? min($fin, $laboralFin) : $laboralFin;

        if ($rangoInicio < $rangoFin) {
            $segundosTotales += $rangoFin->getTimestamp() - $rangoInicio->getTimestamp();
        }
    }

    // Convertir a formato H:i:s para guardar en campo TIME
    $horas = floor($segundosTotales / 3600);
    $minutos = floor(($segundosTotales % 3600) / 60);
    $segundos = $segundosTotales % 60;
    $tiempoSolucion = sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);

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
        // Mail::to($ticket->usuario->user->email)->send(new TicketActualizado($ticket));
        
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
