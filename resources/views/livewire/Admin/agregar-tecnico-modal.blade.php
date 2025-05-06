<div>
    @if ($open)
        <div class="relative z-10">
            <div class="fixed inset-0 bg-afac-gray-low/75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                        <div class="mt-5 px-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3 mb-4">
                            
                            <div class="sm:col-span-1">
                                <x-label for="name" value="{{ __('Nombre(s)*') }}" />
                                <div class="mt-2">
                                    <x-input maxlength="50" id="name" class="block mt-1 w-full" type="text"
                                        name="name" wire:model="name" :value="old('name')" required autofocus autocomplete="name" />
                                </div>
                            </div>

                            <div class="sm:col-span-1">
                                <x-label for="last_name_p" value="{{ __('Apellido Paterno*') }}" />
                                <div class="mt-2">
                                    <x-input maxlength="50" id="last_name_p" class="block mt-1 w-full" type="text"
                                        name="last_name_p" wire:model="last_name_p" :value="old('last_name_p')" required autofocus autocomplete="last_name_p" />
                                </div>
                            </div>

                            <div class="sm:col-span-1">
                                <x-label for="last_name_m" value="{{ __('Apellido Materno') }}" />
                                <div class="mt-2">
                                    <x-input maxlength="50" id="last_name_m" class="block mt-1 w-full" type="text"
                                        name="last_name_m" wire:model="last_name_m" :value="old('last_name_m')" required autofocus autocomplete="last_name_m" />
                                </div>
                            </div>

                            <div class="sm:col-span-1">
                                <x-label for="sex" value="{{ __('Sexo*') }}" />
                                <x-select id="sex" class="block mt-1 w-full bg-afac-gray border rounded-lg" type="text"
                                    name="sex" wire:model="sex" :value="old('sex')" required autofocus autocomplete="sex">
                                    <option value="" selected>Selecciona una opción</option>
                                    @foreach ($generos as $genero)
                                        <option value="{{ $genero->sexo }}"> {{ $genero->sexo }}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="sm:col-span-1">
                                <x-label for="employer_number" value="{{ __('N° empleado*') }}" />
                                <div class="mt-2">
                                    <x-input maxlength="7" id="employer_number" class="block mt-1 w-full" type="text"
                                        name="employer_number" wire:model="employer_number" :value="old('employer_number')" required autofocus
                                        autocomplete="employer_number" />
                                </div>
                            </div>

                            <div class="sm:col-span-1">
                                <x-label for="password" value="{{ __('Contraseña Provisional*') }}" />
                                <div class="mt-2">
                                    <x-input minlength="8" maxlength="15" id="password" class="block mt-1 w-full"
                                        type="password" name="password" wire:model="password" required autocomplete="new-password" />
                                </div>
                            </div>

                            <div class="sm:col-span-1">
                                <x-label for="email" value="{{ __('Correo Electronico*') }}" />
                                <div class="mt-2">
                                    <x-input maxlength="35" id="email" class="block mt-1 w-full" type="email"
                                        name="email" wire:model="email" :value="old('email')" required autocomplete="username" />
                                </div>
                            </div>
        
                            <div class="sm:col-span-1">
                                <x-label for="email_confirmation" value="{{ __('Confirmar Correo*') }}" />
                                <div class="mt-2">
                                    <x-input maxlength="35" id="email_confirmation" class="block mt-1 w-full" type="email"
                                        name="email_confirmation" wire:model="email_confirmation" :value="old('email_confirmation')" required autofocus
                                        autocomplete="email_confirmation" />
                                </div>
                            </div>
                        </div>

                        <div class="col-start-1 col-end-4 mb-4">
                            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert ">
                                <p class="font-bold">RECUERDA</p>
                                <p class="text-sm">INTRODUCE UNA CONTRASEÑA PARA ESTE SISTEMA. RECUERDA QUE DEBE TENER AL MENOS 8
                                    CARACTERES,INCLUYENDO AL MENOS UNA MAYÚSCULA, UNA MINÚSCULA, UN NÚMERO Y UN CARÁCTER ESPECIAL (#, *,
                                    !, @, $, %).</p>
                            </div>
                        </div>
                
                        <x-validation-errors />

                        <div class="flex justify-center space-x-3 mb-5">
                            <x-button-cerrar wire:click="close" type="button">
                                CERRAR
                            </x-button-cerrar>

                            <x-button wire:click="agregarTecnico" type="button">
                                GUARDAR
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
