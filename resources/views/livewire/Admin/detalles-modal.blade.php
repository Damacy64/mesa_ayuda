<div>
    @if ($open)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-afac-gray-low/75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                        <div class="bg-white px-6 py-6 sm:px-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-6" id="modal-title">
                                Detalles del Dispositivo
                            </h3>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <h4 class="font-bold text-gray-700">Información General</h4>
                                    <ul class="list-disc list-inside">
                                        <li><strong>Modelo:</strong> {{ $equipo->modelo ?? 'N/A' }}</li>
                                        <li><strong>Dirección IP:</strong> {{ $equipo->direccion_ip ?? 'N/A' }}</li>
                                        <li><strong>Internet:</strong> {{ $equipo->internet ?? 'N/A' }}</li>
                                        <li><strong>Serie Monitor:</strong> {{ $equipo->serie_monitor ?? 'N/A' }}</li>
                                        <li><strong>Serie Mouse:</strong> {{ $equipo->serie_mouse ?? 'N/A' }}</li>
                                        <li><strong>Serie Teclado:</strong> {{ $equipo->serie_teclado ?? 'N/A' }}</li>
                                        <li><strong>Versión Procesador:</strong> {{ $equipo->version_procesador ?? 'N/A' }}</li>
                                        <li><strong>Estado:</strong> {{ $equipo->estado ?? 'N/A' }}</li>
                                    </ul>
                                </div>

                                <div class="mb-4">
                                    <h4 class="font-bold text-gray-700">Atributos</h4>
                                    <ul class="list-disc list-inside">
                                        @forelse ($atributos as $atributo)
                                            <li><strong>{{ $atributo['tipo'] }}:</strong> {{ $atributo['valor'] }}</li>
                                        @empty
                                            <li>No hay atributos disponibles.</li>
                                        @endforelse
                                    </ul>
                                </div>
                                
                                <div class="mb-4">
                                    <x-label for="usuario">Reasignar Usuario</x-label>
                                    <x-select name="usuario" id="usuario" wire:model="usuario">
                                        <option value="">SELECCIONE UN USUARIO</option>
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>

                            <x-validation-errors class="mb-4" />

                            <div class="flex justify-center space-x-3 mt-4">
                                <x-button-cerrar wire:click="cerrar" type="button">
                                    CERRAR
                                </x-button-cerrar>

                                <x-button wire:click="asignarUsuario" type="button">
                                    GUARDAR
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
</div>
