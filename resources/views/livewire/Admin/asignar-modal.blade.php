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
                                Asignar Dispositivo
                            </h3>

                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-6">
                                <div class="sm:col-span-2">
                                    <x-label for="usuario" value="SELECCIONE USUARIO*" />
                                    <x-select name="usuario" id="usuario" wire:model.live="usuario">
                                        <option value="">SELECCIONE USUARIO</option>
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                        @endforeach
                                    </x-select>
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="inventario" value="NÚMERO DE INVENTARIO*" />
                                    <x-input maxlength="10" id="inventario" name="inventario" type="text" required
                                        autofocus autocomplete="inventario" wire:model="inventario" placeholder="INGRESE NUMERO INVENTARIO"/>
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="serie" value="NÚMERO DE SERIE*" />
                                    <x-input maxlength="10" id="serie" name="serie" type="text" required
                                        autofocus autocomplete="serie" wire:model="serie" placeholder="INGRESE NUMERO SERIE"/>
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="modelo" value="MODELO*" />
                                    <x-input maxlength="50" id="modelo" name="modelo" type="text" required
                                        autofocus autocomplete="modelo" wire:model="modelo" placeholder="INGRESE MODELO"/>
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="marca" value="MARCA*" />
                                    <x-select id="marca" name="marca" wire:model="marca">
                                        <option value="">SELECCIONE MARCA</option>
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca }}">{{ $marca }}</option>
                                        @endforeach
                                    </x-select>
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="direccionIp" value="DIRECCIÓN IP*" />
                                    <x-input maxlength="15" id="direccionIp" name="direccionIp" type="text" required
                                        autofocus autocomplete="direccionIp" placeholder="192.168.0.100" wire:model="direccionIp"/>
                                </div>

                                <div class="sm:col-span-2">
                                    <x-label for="internet" value="SERVICIO INTERNET*" />
                                    <x-input maxlength="35" id="internet" name="internet" type="text"
                                        required autofocus autocomplete="internet" wire:model="internet" placeholder="INALAMBRICA / ALAMBRICA"/>
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

                                @if ($mostraropciones == 1 || $mostraropciones == 3 || $mostraropciones == 2)
                                    <div class="sm:col-span-2">
                                        <x-label for="sistema" value="SISTEMA OPERATIVO*" />
                                        <x-select id="sistema" name="sistema" wire:model.live="sistema">
                                            <option value="">SELECCIONE S.O</option>
                                            @foreach ($sistemas as $sistema)
                                                <option value="{{ $sistema }}">{{ $sistema }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                @if ($mostraropciones == 1 || $mostraropciones == 3 || $mostraropciones == 4 || $mostraropciones == 2 )
                      
                                    <div class="sm:col-span-2">
                                        <x-label for="almacenamiento" value="ALMACENAMIENTO*" />
                                        <x-select id="almacenamiento" name="almacenamiento" wire:model.live="almacenamiento">
                                            <option value="">SELECCIONE CAPACIDAD</option>
                                            @foreach ($almacenamientos as $almacenamiento)
                                                <option value="{{ $almacenamiento }}">{{ $almacenamiento }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif
                                
                                
                                @if ($mostraropciones == 1 || $mostraropciones == 3 || $mostraropciones == 4 || $mostraropciones == 2)
                                    <div class="sm:col-span-2">
                                        <x-label for="memoria" value="CAPACIDAD MEMORIA RAM*" />
                                        <x-select id="memoria" name="memoria" wire:model.live="memoria">
                                            <option value="">SELECCIONE RAM</option>
                                            @foreach ($memorias as $memoria)
                                                <option value="{{ $memoria }}">{{ $memoria }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                @if ($mostraropciones == 4 )
                                    <div class="sm:col-span-2">
                                        <x-label for="flash" value="UNIDAD DISCO FLASH*" />
                                        <x-input maxlength="16" id="flash" name="flash" type="text" required
                                            autofocus autocomplete="flash" wire:model="flash" placeholder="INGRESE CAPACIDAD FLASH"/>
                                    </div>
                                @endif

                                @if ($mostraropciones == 3 || $mostraropciones == 3)
                                    <div class="sm:col-span-2">
                                        <x-label for="serieMonitor" value="SERIE MONITOR*" />
                                        <x-input maxlength="16" id="serieMonitor" name="serieMonitor" type="text" required
                                            autofocus autocomplete="serieMonitor" wire:model="serieMonitor" placeholder="INGRESE NUMERO SERIE"/>
                                    </div>
                                @endif

                                @if ($mostraropciones == 1 || $mostraropciones == 3)
                                    <div class="sm:col-span-2">
                                        <x-label for="serieTeclado" value="SERIE TECLADO*" />
                                        <x-input maxlength="16" id="serieTeclado" name="serieTeclado" type="text" required
                                            autofocus autocomplete="serieTeclado" wire:model="serieTeclado" placeholder="INGRESE NUMERO SERIE"/>
                                    </div>
                                @endif

                                @if ($mostraropciones == 1 || $mostraropciones == 3)
                                    <div class="sm:col-span-2">
                                        <x-label for="serieMouse" value="SERIE MOUSE*" />
                                        <x-input maxlength="16" id="serieMouse" name="serieMouse" type="text" required
                                            autofocus autocomplete="serieMouse" wire:model="serieMouse" placeholder="INGRESE NUMERO SERIE"/>
                                    </div>
                                @endif
                              
                                @if ($mostraropciones == 1 || $mostraropciones == 3 || $mostraropciones == 4 || $mostraropciones == 2)
                               
                                    <div class="sm:col-span-2">
                                        <x-label for="versionOffice" value="VERSION OFFICE" />
                                        <x-select id="versionOffice" name="versionOffice" wire:model.live="versionOffice">
                                            <option value="">SELECCIONE OFFICE</option>
                                            @foreach ($versionesOffice as $version)
                                                <option value="{{ $version }}">{{ $version }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                @if ($mostraropciones == 1 || $mostraropciones == 3 || $mostraropciones == 2)
                                    <div class="sm:col-span-2">
                                        <x-label for="procesador" value="PROCESADOR" />
                                        <x-select id="procesador" name="procesador" wire:model.live="procesador">
                                            <option value="">SELECCIONE PROCESADOR</option>
                                            @foreach ($procesadores as $procesador)
                                                <option value="{{ $procesador }}">{{ $procesador }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                @endif

                                @if ($mostraropciones == 1 || $mostraropciones == 3 || $mostraropciones == 2)
                                    <div class="sm:col-span-2">
                                        <x-label for="versionProcesador" value="VERSION PROCESADOR*" />
                                        <x-input maxlength="16" id="versionProcesador" name="versionProcesador" type="text" required
                                            autofocus autocomplete="versionProcesador" placeholder="INGRESE VERSION PROCESADOR" wire:model="versionProcesador"/>
                                    </div>
                                @endif

                                <div class="mt-4 sm:col-span-6 col-span-1">
                                    <x-validation-errors />
                                </div>

                            </div>
                            <div class="flex justify-center space-x-3 mt-4">
                                <x-button-cerrar wire:click="closemodal" type="button">
                                    CERRAR
                                </x-button-cerrar>
                                <x-button wire:click="asignar" type="button">
                                    GUARDAR
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
</div>
