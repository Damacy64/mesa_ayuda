<div>
    @if ($open)
        <div class="relative z-10">
            <div class="fixed inset-0 bg-afac-gray-low/75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">

                        <div class="bg-white px-6 py-6 sm:px-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4" id="modal-title">{{ $this->Estatus }}</h3>

                            <table class="w-full text-sm text-left bg-white border">
                                <thead class="bg-afac-golden text-white">
                                    <tr>
                                        <th class="p-2">Folio</th>
                                        <th class="p-2">Tipo de Ticket</th>
                                        <th class="p-2">Dispositivo</th>
                                        <th class="p-2">Tipo de Falla</th>
                                        <th class="p-2">Numero de serie</th>
                                        <th class="p-2">Descripción del problema</th>
                                        @if (in_array($ticket->estatus_id, ['CERRADO', 'EN REVISIÓN']))
                                            <th class="p-2">Solución</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="text-black">
                                    @if ($ticket)
                                        <tr class="border-t">
                                            <td class="p-2">{{ $ticket->folio }}</td>
                                            <td class="p-2">{{ $ticket->titulo }}</td>
                                            <td class="p-2">{{ $ticket->equipo->modelo ?? 'N/A' }}</td>
                                            <td class="p-2">
                                                {{ $ticket->opciones->where('tipo', 'falla')->first()->valor ?? 'N/A' }}
                                            </td>
                                            <td class="p-2">{{ $ticket->equipo->numero_serie ?? 'N/A' }}</td>
                                            <td class="p-2">{{ $ticket->descripcion ?? 'N/A' }}</td>
                                            @if (in_array($ticket->estatus_id, ['CERRADO', 'EN REVISIÓN']))
                                                <td class="p-2">{{ $ticket->solucion ?? 'N/A' }}</td>
                                            @endif
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center p-2">No hay información disponible
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <x-validation-errors />

                            <div class="flex justify-center space-x-3">
                                @if ($ticket->estatus_id === 'CERRADO')
                                    <x-button-cerrar wire:click="close" type="button">
                                        CERRAR
                                    </x-button-cerrar>
                                @else
                                    <x-button-cerrar wire:click="close" type="button">
                                        CERRAR
                                    </x-button-cerrar>

                                    <x-button wire:click="" type="button">
                                        GUARDAR
                                    </x-button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
