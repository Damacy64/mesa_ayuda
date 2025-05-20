<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ActualizarPrioridadTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:actualizar-prioridad-tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza la prioridad de los tickets según el tiempo transcurrido';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ahora = Carbon::now();

        // Cambiar a MEDIA si pasaron más de 24h y sigue siendo BAJA y está ABIERTO
        Ticket::where('prioridad_id', 'BAJA')
            ->where('estatus_id', 'ABIERTO')
            ->where('created_at', '<=', $ahora->copy()->subHours(24))
            ->update(['prioridad_id' => 'MEDIA']);

        // Cambiar a ALTA si pasaron más de 48h y sigue siendo MEDIA o BAJA y está ABIERTO
        Ticket::whereIn('prioridad_id', ['BAJA', 'MEDIA'])
            ->where('estatus_id', 'ABIERTO')
            ->where('created_at', '<=', $ahora->copy()->subHours(48))
            ->update(['prioridad_id' => 'ALTA']);

        $this->info('Prioridades de tickets actualizadas correctamente.');
    }
}
