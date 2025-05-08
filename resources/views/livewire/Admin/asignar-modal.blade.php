<div>
    @if ($open)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                        <div class="bg-white px-6 py-6 sm:px-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-6" id="modal-title">
                                Asignar Dispositivo
                            </h3>

                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-6">
                                <div class="sm:col-span-2">
                                    <x-label for="usuario" value="SELECCIONE USUARIO*" />
                                    <x-select name="usuario_id" label="Usuario"
                                        wire:model="">
                                        <option value="">SELECCIONE USUARIO</option>
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
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
                                    <x-select id="marca" name="marca" wire:model="">
                                        <option value="">SELECCIONE MARCA</option>
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca }}">{{ $marca }}</option>
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

                                <div class="sm:col-span-2">
                                    <x-label for="dispositivo" value="DISPOSITIVO*" />
                                    <x-select id="dispositivo" name="dispositivo" wire:model.live="dispositivo">
                                        <option value="">SELECCIONE DISPOSITIVO</option>
                                        @foreach ($dispositivos as $dispositivo)
                                            <option value="{{ $dispositivo }}">{{ $dispositivo }}</option>
                                        @endforeach
                                    </x-select>
                                </div>

                                @if ($mostraropciones == 1 || $mostraropciones == 3 )
                                    <div class="sm:col-span-2">
                                        <x-label for="sistema_operativo" value="SISTEMA OPERATIVO*" />
                                        <x-select id="sistema_operativo" name="sistema_operativo" wire:model.live="sistema">
                                            <option value="">SELECCIONE S.O</option>
                                            @foreach ($sistemas as $sistema)
                                                <option value="{{ $sistema }}">{{ $sistema }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                @if ($mostraropciones == 1 || $mostraropciones == 3 || $mostraropciones == 4)
                                    <div class="sm:col-span-2">
                                        <x-label for="almacenamiento" value="ALMACENAMIENTO*" />
                                        <x-select id="almacenamiento" name="almacenamiento" wire:model.live="">
                                            <option value="">SELECCIONE CAPACIDAD</option>
                                            @foreach ($almacenamientos as $almacenamiento)
                                                <option value="{{ $almacenamiento }}">{{ $almacenamiento }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif
                                
                                
                                @if ($mostraropciones == 1 || $mostraropciones == 3 || $mostraropciones == 4)
                                    <div class="sm:col-span-2">
                                        <x-label for="memoria_ram" value="CAPACIDAD MEMORIA RAM*" />
                                        <x-select id="memoria_ram" name="memoria_ram" wire:model.live="">
                                            <option value="">SELECCIONE RAM</option>
                                            @foreach ($memorias as $memoria)
                                                <option value="{{ $memoria }}">{{ $memoria }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                @if ($mostraropciones == 4 )
                                    <div class="sm:col-span-2">
                                        <x-label for="disco_flash" value="UNIDAD DISCO FLASH*" />
                                        <x-input maxlength="16" id="disco_flash" name="disco_flash" type="text" required
                                            autofocus autocomplete="disco_flash" placeholder="" />
                                    </div>
                                @endif

                                @if ($mostraropciones == 3 || $mostraropciones == 3)
                                    <div class="sm:col-span-2">
                                        <x-label for="serie_monitor" value="SERIE MONITOR*" />
                                        <x-input maxlength="16" id="serie_monitor" name="serie_monitor" type="text" required
                                            autofocus autocomplete="serie_monitor" placeholder="" />
                                    </div>
                                @endif

                                @if ($mostraropciones == 1 || $mostraropciones == 3)
                                    <div class="sm:col-span-2">
                                        <x-label for="serie_teclado" value="SERIE TECLADO*" />
                                        <x-input maxlength="16" id="serie_teclado" name="serie_teclado" type="text" required
                                            autofocus autocomplete="serie_teclado" placeholder="" />
                                    </div>
                                @endif

                                @if ($mostraropciones == 1 || $mostraropciones == 3)
                                    <div class="sm:col-span-2">
                                        <x-label for="serie_mouse" value="SERIE MOUSE*" />
                                        <x-input maxlength="16" id="serie_mouse" name="serie_mouse" type="text" required
                                            autofocus autocomplete="serie_mouse" placeholder="" />
                                    </div>
                                @endif
                                
                                @if ($mostraropciones == 1 || $mostraropciones == 3 || $mostraropciones == 4)
                                    <div class="sm:col-span-2">
                                        <x-label for="version_office" value="VERSION OFFICE" />
                                        <x-select id="version_office" name="version_office" wire:model.live="">
                                            <option value="">SELECCIONE OFFICE</option>
                                            @foreach ($versionesOffice as $version)
                                                <option value="{{ $version }}">{{ $version }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                @if ($mostraropciones == 1 || $mostraropciones == 3)
                                    <div class="sm:col-span-2">
                                        <x-label for="procesador" value="PROCESADOR" />
                                        <x-select id="procesador" name="procesador" wire:model.live="">
                                            <option value="">SELECCIONE PROCESADOR</option>
                                            @foreach ($procesadores as $procesador)
                                                <option value="{{ $procesador }}">{{ $procesador }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                @if ($mostraropciones == 1 || $mostraropciones == 3)
                                    <div class="sm:col-span-2">
                                        <x-label for="version_procesador" value="VERSION PROCESADOR*" />
                                        <x-input maxlength="16" id="version_procesador" name="version_procesador" type="text" required
                                            autofocus autocomplete="version_procesador" placeholder="" />
                                    </div>
                                @endif

                                <div class="mt-4">
                                    <x-validation-errors />
                                </div>

                            </div>
                            <div class="flex justify-center space-x-3 mt-4">
                                <x-button-cerrar wire:click="closemodal" type="button">
                                    CERRAR
                                </x-button-cerrar>
                                <x-button wire:click="" type="button">
                                    GUARDAR
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
</div>
