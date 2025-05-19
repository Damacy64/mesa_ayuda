<div>
    @if ($open)
        <div class="relative z-10">
            <div class="fixed inset-0 bg-afac-gray-low/75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">

                        <div class="bg-white px-6 py-6 sm:px-6">
                            <div class="overflow-x-auto mb-6">
                                <table class="w-full text-sm text-left bg-white border">
                                    <thead class="bg-afac-golden text-white">
                                        <tr>
                                            <th class="p-2 text-center">Campo Modificado</th>
                                            <th class="p-2 text-center">Anterior</th>
                                            <th class="p-2 text-center">Despues</th>
                                            <th class="p-2 text-center">Fecha Cambio</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-black">
                                        @forelse ($historial as $cambio)
                                            <tr class="border-t">
                                                <td class="p-2 text-center">{{ $cambio->campo_modificado}}</td>
                                                <td class="p-2 text-center">{{ $cambio->valor_anterior ?? 'N/A'}}</td>
                                                <td class="p-2 text-center">{{ $cambio->valor_nuevo}}</td>
                                                <td class="p-2 text-center">{{ $cambio->fecha_cambio}}</td>
                                            </tr>
                                        @empty
                                            <tr class="border-t">
                                                <td class="p-2 text-center" colspan="4">No hay cambios registrados</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-center space-x-3">
                                <x-button-cerrar wire:click="cerrar" type="button">
                                    CERRAR
                                </x-button-cerrar>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
