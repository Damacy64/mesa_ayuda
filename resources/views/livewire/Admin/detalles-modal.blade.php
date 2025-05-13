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
                                    <ul class="list-disc list-inside space-y-2">
                                        <li class="flex justify-start items-center"><strong>Modelo:</strong>
                                            {{ $equipo->modelo ?? 'N/A' }}</li>
                                        <li class="flex justify-start items-center"><strong>Numero Serie:</strong>
                                            {{ $equipo->numero_serie ?? 'N/A' }}</li>
                                        <li class="flex justify-start items-center"><strong>Dirección IP:</strong>
                                            <x-input name="direccion_ip" class="bg-white" wire:model="direccion_ip"/>
                                        </li>
                                        <li class="flex justify-start items-center"><strong>Internet:</strong> <x-input
                                                name="internet" class="bg-white" wire:model="internet"/></li>
                                        <li class="flex justify-start items-center"><strong>Serie Monitor:</strong>
                                            <x-input name="serie_monitor" class="bg-white" wire:model="serie_monitor"/>
                                        </li>
                                        <li class="flex justify-start items-center"><strong>Serie Mouse:</strong>
                                            <x-input name="serie_mouse" class="bg-white" wire:model="serie_mouse"/>
                                        </li>
                                        <li class="flex justify-start items-center"><strong>Serie Teclado:</strong>
                                            <x-input name="serie_teclado" class="bg-white" wire:model="serie_teclado"/>
                                        </li>
                                        <li class="flex justify-start items-center"><strong>Versión Procesador:</strong>
                                            <x-input name="version_procesador" class="bg-white" wire:model="version_procesador"/></li>
                                        <li class="flex justify-start items-center"><strong>Estado:</strong>
                                            {{ $equipo->estado ?? 'N/A' }}</li>
                                    </ul>
                                </div>

                                <div class="mb-4">
                                    <h4 class="font-bold text-gray-700">Atributos</h4>
                                    <ul class="list-disc list-inside space-y-2">
                                        <li class="flex justify-start items-center"><strong>Almacenamiento:</strong>
                                            <x-select name="almacenamiento" id="almacenamiento" class="bg-white" wire:model="almacenamiento">
                                                <option value="">Seleccione una opción</option>
                                                @foreach ($almacenamientos as $almacenamiento)
                                                    <option value="{{ $almacenamiento }}">{{ $almacenamiento }}</option>
                                                @endforeach
                                            </x-select>   
                                        </li>
                                        <li class="flex justify-start items-center"><strong>Marca:</strong>
                                            <x-select name="marca" id="marca" class="bg-white" wire:model="marca">
                                                <option value="">Seleccione una opción</option>
                                                @foreach ($marcas as $marca)
                                                    <option value="{{ $marca }}">{{ $marca }}</option>
                                                @endforeach
                                            </x-select>   
                                        </li>
                                        <li class="flex justify-start items-center"><strong>Office:</strong>
                                            <x-select name="office" id="office" class="bg-white" wire:model="office">
                                                <option value="">Seleccione una opción</option>
                                                @foreach ($versionesOffice as $office)
                                                    <option value="{{ $office }}">{{ $office }}</option>
                                                @endforeach
                                            </x-select>   
                                        </li>
                                        <li class="flex justify-start items-center"><strong>Procesador:</strong>
                                            <x-select name="procesador" id="procesador" class="bg-white" wire:model="procesador">
                                                <option value="">Seleccione una opción</option>
                                                @foreach ($procesadores as $procesador)
                                                    <option value="{{ $procesador }}">{{ $procesador }}</option>
                                                @endforeach
                                            </x-select>   
                                        </li>
                                        <li class="flex justify-start items-center"><strong>RAM:</strong>
                                            <x-select name="ram" id="ram" class="bg-white" wire:model="memoria">
                                                <option value="">Seleccione una opción</option>
                                                @foreach ($memorias as $ram)
                                                    <option value="{{ $ram }}">{{ $ram }}</option>
                                                @endforeach
                                            </x-select>   
                                        </li>
                                        <li class="flex justify-start items-center"><strong>Sistema Operativo:</strong>
                                            <x-select name="sistema" id="sistema" class="bg-white" wire:model="sistema_operativo">
                                                <option value="">Seleccione una opción</option>
                                                @foreach ($sistemas as $sistema)
                                                    <option value="{{ $sistema }}">{{ $sistema }}</option>
                                                @endforeach
                                            </x-select>   
                                        </li>
                                    </ul>
                                </div>

                                <div class="mb-4">
                                    <x-label for="usuario">Reasignar Usuario</x-label>
                                    <x-select name="usuario" id="usuario" wire:model="usuario">
                                        <option value="">SELECCIONE UN USUARIO</option>
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
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
