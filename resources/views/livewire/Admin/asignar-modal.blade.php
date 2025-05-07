<div>
    @if ($open)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                        <div class="bg-white px-6 py-6 sm:px-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-6" id="modal-title">
                                Asignar Dispositivo
                            </h3>

                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-6">
                                <div class="sm:col-span-2">
                                    <x-label for="usuario" value="SELECCIONE USUARIO*" />
                                    <x-select name="usuario_id" label="Usuario" wire:model="equipoSeleccionado.usuario_id">
                                        <option value="">Seleccione Usuario</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </x-select>
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="inventario" value="NÚMERO DE INVENTARIO*" />
                                    <x-input maxlength="10" id="inventario" name="inventario" type="text" required
                                        autofocus autocomplete="inventario" />
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="serie" value="NÚMERO DE SERIE*" />
                                    <x-input maxlength="10" id="serie" name="serie" type="text" required
                                        autofocus autocomplete="serie" />
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="modelo" value="MODELO*" />
                                    <x-input maxlength="50" id="modelo" name="modelo" type="text" required
                                        autofocus autocomplete="modelo" />
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="marca" value="MARCA*" />
                                    <x-select id="marca" name="marca" wire:model="equipoSeleccionado.marca">
                                        <option value="">SELECCIONE MARCA</option>
                                        @foreach ($atributo_tipo as $atributo_tipo)
                                            <option value="{{ $atributo_tipo->id }}">{{ $atributo_tipo->valor }}</option>
                                        @endforeach
                                    </x-select>
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="ip" value="DIRECCIÓN IP*" />
                                    <x-input maxlength="16" id="ip" name="direccion_ip" type="text" required
                                        autofocus autocomplete="direccion_ip" placeholder="192.168.0.100" />
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="servicio" value="SERVICIO INTERNET*" />
                                    <x-input maxlength="35" id="servicio" name="servicio_internet" type="text"
                                        required autofocus autocomplete="servicio_internet" />
                                </div>

                                <div>
                                    <x-label for="dispositivo" value="SELECCIONE DISPOSITIVO*" />
                                    <x-select id="dispositivo" name="dispositivo" wire:model.live="mostraropciones">
                                        <option value="">SELECCIONE</option>
                                        @foreach ($tiposDispositivo as $tipo)
                                            <option value="{{ $tipo->nivel }}">{{ $tipo->nombre }}</option>
                                        @endforeach
                                    </x-select>
                                </div>

                                @if ($mostraropciones >= 2)
                                    <div>
                                        <x-select id="tipo" name="tipo" wire:model.live="tipo">
                                            <option value="">SELECCIONE</option>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}">
                                                    {{ $tipo->valor }}
                                                </option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                @if ($mostraropciones >= 3)
                                    <div>
                                        <x-select id="componente" name="componente_id" wire:model.live="componente">
                                            <option value="">SELECCIONE</option>
                                            @foreach ($componentes as $componente)
                                                <option value="{{ $componente->id }}">
                                                    {{ $componente->valor }}
                                                </option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                @if ($mostraropciones >= 4)
                                    <div>
                                        <x-select id="falla" name="falla_id" wire:model.live="falla">
                                            <option value="">SELECCIONE</option>
                                            @foreach ($fallas as $falla)
                                                <option value="{{ $falla->id }}">
                                                    {{ $falla->valor }}
                                                </option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                <div class="mt-4">
                                    <x-validation-errors />
                                </div>

                                <div class="mt-6 flex justify-center space-x-4">
                                    <x-button-cerrar wire:click="closemodal" type="button">
                                        CERRAR
                                    </x-button-cerrar>
                                    <x-button wire:click="guardarTicket" type="button">
                                        GUARDAR
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
</div>
