<div>
    <div class="flex items-center mb-4 p-4">
        <h1 class="text-2xl font-bold text-black">Resumen de tickets</h1>
    </div>

    <div class="overflow-x-auto mb-6">
        <table class="w-full text-sm text-left bg-white border">
            <thead class="bg-afac-golden text-white">
                <tr>
                    <th class="p-2">Folio</th>
                    <th class="p-2">Título</th>
                    <th class="p-2">Dispositivo</th>
                    <th class="p-2">Fecha de creación</th>
                    <th class="p-2">Descripción</th>
                    <th class="p-2">Solución</th>
                    <th class="p-2">Estatus</th>
                    <th class="p-2">Acción</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @forelse ($tickets as $ticket)
                    <tr class="border-t">
                        <td class="p-2">{{ $ticket->folio }}</td>
                        <td class="p-2">{{ $ticket->titulo }}</td>
                        <td class="p-2">{{ $ticket->equipo_id }}</td>
                        <td class="p-2">{{ $ticket->created_at }}</td>
                        <td class="p-2">{{ $ticket->descripcion }}</td>
                        <td class="p-2">{{ $ticket->solucion }}</td>
                        <td class="p-2">{{ $ticket->estatus_id }}</td>
                        <td class="p-2">
                            <a href="" wire:click.prevent="reabrirTicket( {{ $ticket->folio }} )"
                                class="text-blue-500 hover:text-blue-700">Reabrir</a>
                        </td>
                    </tr>
                @empty
                    <tr class="text-black">
                        <td colspan="6" class="text-center py-4">No hay tickets disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $tickets->links('components.pagination') }}
    </div>
</div>
