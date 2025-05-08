<div>
    @if ($open)
        <div class="relative z-10">
            <div class="fixed inset-0 bg-afac-gray-low/75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">

                        <div class="bg-white px-6 py-6 sm:px-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4" id="modal-title">Estadisticas</h3>

                            <div class="mt-1">
                                <x-label for="nombre">Ingrese la fecha para determinar las estadisticas*</x-label>
                            </div>
                            <div class="flex justify-items-between ">
                                <x-input maxlength="50" id="fecha" class="mt-1 w-32" type="date"
                                name="fecha" wire:model="fecha" required autofocus autocomplete="off" />
                                <x-label class="m-2" for="fecha">al</x-label>
                                <x-input maxlength="50" id="fecha" class="mt-1 w-32" type="date"
                                name="fecha" wire:model="fecha" required autofocus autocomplete="off" />
                            </div>

                            <div class="overflow-x-auto mb-6">
                            <div class="mt-4 mb-6">
                                <x-label for="descripcion">Se muestran las estadisticas del ultimo periodo (mes-mes)</x-label>
                                <table class="w-full text-sm text-left bg-white border">
                                    <thead class="bg-afac-golden text-white">
                                        <tr>
                                            <th class="p-2">Total Tickets</th>
                                            <th class="p-2">Tickets Abiertos</th>
                                            <th class="p-2">Tiempo Promedio</th>
                                            <th class="p-2">Tickets en Revisión</th>
                                            <th class="p-2">Tiempo Promedio</th>
                                            <th class="p-2">Tickets Cerrados</th>
                                            <th class="p-2">Tecnico mas Activo</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-black">
                                        @if ($ticket)
                                            <tr class="border-t">
                                                <td class="p-2">{{ $ticket->folio }}</td>
                                                <td class="p-2">{{ $ticket->titulo }}</td>
                                                <td class="p-2">{{ $ticket->folio }}</td>
                                                <td class="p-2">{{ $ticket->titulo }}</td>
                                                <td class="p-2">{{ $ticket->equipo->modelo ?? 'N/A' }}</td>
                                                <td class="p-2">{{ $ticket->equipo->numero_serie ?? 'N/A' }}</td>
                                                <td class="p-2">{{ $ticket->descripcion ?? 'N/A' }}</td>
                                            
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center p-2">No hay información disponible</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                            <x-validation-errors />

                    
                            <div class="flex justify-center space-x-3">
                                <x-button-cerrar wire:click="closemodal" type="button">
                                    CERRAR
                                </x-button-cerrar>

                                <x-button wire:click="descargarEstadisticas" type="button">
                                    DESCARGAR
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
