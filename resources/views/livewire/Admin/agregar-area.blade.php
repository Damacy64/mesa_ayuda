<div>
    @if ($open)
        <div class="relative z-10">
            <div class="fixed inset-0 bg-afac-gray-low/75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">

                        <div class="bg-white px-6 py-6 sm:px-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4" id="modal-title">Agregar Área</h3>

                            <div class="mt-2">
                                <x-label for="nombre">Nombre del Área*</x-label>
                                <x-input maxlength="50" id="nombre" class="block mt-1 w-full" type="text"
                                name="nombre" wire:model="nombre" required autofocus autocomplete="off" />
                       
                            </div>
                            <div class="mb-6">
                                <x-label for="descripcion">Descripción*</x-label>
                                <x-textarea wire:model="descripcion" name="descripcion" id="descripcion" maxlength="250" rows="4"
                                    class="w-full  rounded-md p-2"></x-textarea>
                            </div>

                            <x-validation-errors />

                    
                            <div class="flex justify-center space-x-3">
                                <x-button-cerrar wire:click="closemodal" type="button">
                                    CERRAR
                                </x-button-cerrar>

                                <x-button wire:click="guardarArea" type="button">
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
