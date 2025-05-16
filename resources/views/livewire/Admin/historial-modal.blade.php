<div>
    @if ($open)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-afac-gray-low/75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                        <div class="bg-white px-6 py-6 sm:px-6">
                            <div class="overflow-x-auto mb-6">
                                <table class="w-full text-sm text-left bg-white border">
                                    <thead class="bg-afac-golden text-white">
                                        <tr>
                                            <th class="p-2 text-center">Categoria</th>
                                            <th class="p-2 text-center">Anterior</th>
                                            <th class="p-2 text-center">Despues</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-black">
                                        @forelse ($historial as $cambio)
                                            <tr class="border-t">
                                                <td class="p-2 text-center">{{ $cambio->atributo_tipo}}</td>
                                                <td class="p-2 text-center">{{ $cambio->atributo_valor_anterior ?? 'N/A'}}</td>
                                                <td class="p-2 text-center">{{ $cambio->atributo_valor_nuevo}}</td>
                                            </tr>
                                        @empty
                                            <tr class="border-t">
                                                <td class="p-2 text-center" colspan="3">No hay cambios registrados</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex justify-center space-x-3 mt-4">
                                <x-button-cerrar wire:click="cerrar" type="button">
                                    CERRAR
                                </x-button-cerrar>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
</div>
