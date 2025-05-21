<?php

namespace App\Livewire\Admin;

use App\Models\Ticket;
use Livewire\Attributes\On;
use App\Models\Support;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TicketsAdmin extends Component
{
    use WithPagination;
    
    public $search = '';
    public $ticket;
    public $estatus= 'CERRADO';
    public $fecha_termino;
    public $sortField = '';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }   
        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On('reasignado')]
    public function render()
    {
        $tickets = Ticket::with(['usuario.user', 'tecnico', 'opciones'])
            ->when($this->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->Where('created_at', 'like', "%{$search}%")
                        ->orWhere('prioridad_id', 'like', "%{$search}%")
                        ->orWhere('estatus_id', 'like', "%{$search}%")

                        // Buscar por numero de empleado
                        ->orWhereHas(
                            'usuario.user',
                            fn($q2) =>
                            $q2->where('employer_number', 'like', "%{$search}%")
                        )
                        // Buscar por nombre de usuario final
                        ->orWhereHas(
                            'usuario.user',
                            fn($q2) =>
                            $q2->where('name', 'like', "%{$search}%")
                        )

                        // Buscar por nombre del técnico
                        ->orWhereHas(
                            'tecnico.user',
                            fn($q2) =>
                            $q2->where('name', 'like', "%{$search}%")
                        )

                        // Buscar en cualquier opción (categoria y falla)
                        ->orWhereHas(
                            'opciones',
                            fn($q2) =>
                            $q2->where('valor', 'like', "%{$search}%")
                        );
                });
            })
            ->orderBy($this->sortField ?: 'created_at', $this->sortDirection)
            ->paginate(5);

        return view('livewire.admin.tickets-admin', compact('tickets'));
    }

    public function abrirModal($ticket)
    {
        $this->dispatch('abrir-revision-modal', $ticket);
    }

public function cerrarTicket($folio)
    {
        $ticket = Ticket::findorFail($folio);
 
        if ($this->estatus === 'CERRADO') {
        
            $created_at = new \DateTime($ticket->created_at);
            $fecha_termino = new \DateTime(); 

            $horaEntrada = explode(':', $ticket->tecnico->hora_entrada);
            $horaSalida = explode(':', $ticket->tecnico->hora_salida);

            list($hEntrada, $mEntrada, $sEntrada) = array_pad($horaEntrada, 3, 0);
            list($hSalida, $mSalida, $sSalida) = array_pad($horaSalida, 3, 0);

            $minutosTotales = 0;

            $periodo = new \DatePeriod((clone $created_at)->setTime(0, 0), new \DateInterval('P1D'), (clone $fecha_termino)->setTime(0, 0)->modify('+1 day'));

            foreach ($periodo as $dia) {
                if (in_array($dia->format('N'), [6, 7])) continue; 
            $ticket = Ticket::findorFail($folio);
            $valorAnterior = $ticket->estatus_id;
            $ticket->update(['estatus_id' => 'CERRADO']);

            DB::table('ticket_history')->insert([
                'ticket_id' => $ticket->folio,
                'campo_modificado' => 'estatus_id',
                'valor_anterior' => $valorAnterior,
                'valor_nuevo' => 'CERRADO',
                'fecha_cambio' => now(),
            ]);
            $horaInicio = (clone $dia)->setTime($hEntrada, $mEntrada, $sEntrada);
            $horaFin = (clone $dia)->setTime($hSalida, $mSalida, $sSalida);

            $desde = max($horaInicio, $created_at);
            $hasta = min($horaFin, $fecha_termino);

            if ($desde < $hasta) {
                $minutosTotales += ($hasta->getTimestamp() - $desde->getTimestamp()) / 60;
                }
            }
        }
        $fecha_termino = $fecha_termino->format('Y-m-d H:i:s');   

        $tiempoSolucion = sprintf('%02d%02d%02d',
            floor($minutosTotales / 60),
            $minutosTotales % 60,
            0
        );

        $ticket->update([
            'estatus_id' => $this->estatus,
            'fecha_termino' => $fecha_termino,
            'tiempo_solucion' => $tiempoSolucion,
          
        ]);
    }

    public function abrirHistorial($ticket)
    {
        $this->dispatch('abrir-historial-modal', $ticket);
    }

        
        
}