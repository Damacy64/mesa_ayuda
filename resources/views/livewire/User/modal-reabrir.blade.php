<div>
    @if ($open)
        <div class="relative z-10">
            <div class="fixed inset-0 bg-afac-gray-low/75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 w-full max-w-4xl mx-auto">

                        <div class="bg-white px-4 py-6 sm:px-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4" id="modal-title">Actualizar Ticket</h3>

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
                                       
                                    </tbody>
                                </table>
                            </div>

                            <div class="mb-4">
                                <x-label for="descripcion">¿Por qué deseas reabrir este ticket?*</x-label>
                                <textarea wire:model="descripcion" id="descripcion" maxlength="250" rows="4"
                                    class="w-full border border-black rounded-md p-2"></textarea>
                            </div>
                            
                            <x-validation-errors class="mb-4" />

                            <div class="flex justify-center space-x-3">
                                <x-button-cerrar wire:click="cerrarModal" type="button">Cerrar</x-button-cerrar>
                                <x-button wire:click="">Enviar</x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
