<div>
    @if ($open)
        <div class="relative z-10">
            <div class="fixed inset-0 bg-afac-gray-low/75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                        <div class="bg-white px-6 py-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4" id="modal-title">Crear Ticket</h3>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                                <div>
                                    <x-label>Seleccione Tipo *</x-label>
                                    <x-select>
                                    </x-select>
                                </div>
                                <div>
                                    <x-label>Seleccione *</x-label>
                                    <x-select>
                                    </x-select>
                                </div>
                                <div>
                                    <x-label>Seleccione *</x-label>
                                    <x-select>
                                    </x-select>
                                </div>
                                <div>
                                    <x-label>Seleccione Falla *</x-label>
                                    <x-select>
                                    </x-select>
                                </div>
                            </div>

                            @livewire('device-user')

                            <div class="mb-6">
                                <x-label>Escriba una descripción del problema </x-label>
                                <textarea maxlength="250" rows="4" class="w-full border border-black rounded-md p-2"></textarea>
                            </div>

                            <div class="flex justify-end space-x-3">
                                <x-button-cerrar wire:click="closemodal" type="button"
                                    class="bg-gray-300 hover:bg-gray-400 text-white font-semibold py-2 px-4 rounded">
                                    CERRAR
                                </x-button-cerrar>
                                
                                <x-button>
                                    ENVIAR
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
