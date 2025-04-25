<div>
    @if ($open)
        <div class="relative z-10">
            <div class="fixed inset-0 bg-afac-gray-low/75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                        <div class="bg-white px-6 py-6">
                            <h2 class="text-lg font-bold mb-4">Actualizar Ticket</h2>

                            <table class="w-full text-sm text-left bg-white border">
                                <thead class="bg-afac-golden text-white">
                                    <tr>
                                        <th class="p-2">Folio</th>
                                        <th class="p-2">Tipo de Ticket</th>
                                        <th class="p-2">Equipo</th>
                                        <th class="p-2">Tipo de Falla</th>
                                        <th class="p-2">Numero de serie</th>
                                        <th class="p-2">Descripción del problema</th>
                                    </tr>
                                </thead>
                                <tbody class="text-black">
                                    
                                    @if ($ticket)
                                        <tr class="border-t">
                                            <td class="p-2">{{ $ticket->folio }}</td>
                                            <td class="p-2">{{ $ticket->titulo }}</td>
                                            <td class="p-2">{{ $ticket->equipo }}</td>
                                            <td class="p-2">{{ $ticket->tipo_falla }}</td>
                                            <td class="p-2">{{ $ticket->numero_serie }}</td>
                                            <td class="p-2">{{ $ticket->descripcion }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="6" class="p-2 text-center">No hay datos disponibles.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <div class="mb-4">
                                <x-label for="descripcion">Escriba una descripcion de la solución *</x-label>
                                <textarea wire:model="descripcion" id="descripcion" maxlength="250" rows="4"
                                    class="w-full border border-black rounded-md p-2"></textarea>
                            </div>

                            <div class="mb-4">
                                <x-label for="estatus" value="Estatus" />
                                <x-select id="estatus" wire:model="estatus">
                                    @foreach ($status as $statu)
                                        <option value="{{ $statu->nombre }}">{{ $statu->nombre }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <x-validation-errors class="mb-4" />
                            <div class="flex justify-end space-x-4">
                                <x-button-cerrar wire:click="cerrarModal" type="button"
                                    class="bg-gray-300">Cerrar</x-button-cerrar>
                                <x-button wire:click="actualizarTicket">Enviar</x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
