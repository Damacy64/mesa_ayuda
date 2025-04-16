<div>
    <x-header class="uppercase">REGISTRO USUARIO</x-header>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-2">
                        <x-label for="name" value="{{ __('Nombre(s)*') }}" />
                        <div class="mt-2">
                            <x-input maxlength="50" id="name" class="block mt-1 w-full" type="text"
                                name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <x-label for="last_name_p" value="{{ __('Apellido Paterno*') }}" />
                        <div class="mt-2">
                            <x-input maxlength="30" id="last_name_p" class="block mt-1 w-full" type="text"
                                name="last_name_p" :value="old('last_name_p')" required autofocus autocomplete="last_name_p" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <x-label for="last_name_m" value="{{ __('Apellido Materno') }}" />
                        <div class="mt-2">
                            <x-input maxlength="30" id="last_name_m" class="block mt-1 w-full" type="text"
                                name="last_name_m" :value="old('last_name_m')" autofocus autocomplete="last_name_m" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">

                        <x-label for="location" value="{{ __('Ubicacion*') }}" />
                        <x-select id="location" class="block mt-1 w-full bg-afac-gray border rounded-lg" type="text"
                            name="location" :value="old('location')" required autofocus autocomplete="location">
                            @foreach ($ubicaciones as $ubicacion)
                                <option value="{{ $ubicacion->piso }}">{{ $ubicacion->piso }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="sm:col-span-2">
                        <x-label for="area" value="{{ __('Area*') }}" />
                        <x-select id="area" class="block mt-1 w-full bg-afac-gray border rounded-lg" type="text"
                            name="area" :value="old('area')" required autofocus autocomplete="area">
                            @foreach ($areas as $area)
                                <option value="{{ $area->departamento }}">{{ $area->departamento }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="sm:col-span-2">
                        <x-label for="employer_number" value="{{ __('N° empleado*') }}" />
                        <div class="mt-2">
                            <x-input maxlength="7" id="employer_number" class="block mt-1 w-full" type="text"
                                name="employer_number" :value="old('employer_number')" required autofocus
                                autocomplete="employer_number" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <x-label for="email" value="{{ __('Correo institucional*') }}" />
                        <div class="mt-2">
                            <x-input maxlength="35" id="email" class="block mt-1 w-full" type="email"
                                name="email" :value="old('email')" required autocomplete="username" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <x-label for="email_confirmation" value="{{ __('Confirmar Correo') }}" />
                        <div class="mt-2">
                            <x-input maxlength="35" id="email_confirmation" class="block mt-1 w-full" type="text"
                                name="email_confirmation" :value="old('email_confirmation')" required autofocus
                                autocomplete="email_confirmation" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <x-label for="sex" value="{{ __('Sexo*') }}" />
                        <x-select id="sex" class="block mt-1 w-full bg-afac-gray border rounded-lg" type="text"
                            name="sex" :value="old('sex')" required autofocus autocomplete="sex">
                            @foreach ($generos as $genero)
                                <option value="{{ $genero->sexo }}"> {{ $genero->sexo }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="sm:col-span-2">
                        <x-label for="password" value="{{ __('Contraseña*') }}" />
                        <div class="mt-2">
                            <x-input minlength="8" maxlength="15" id="password" class="block mt-1 w-full"
                                type="password" name="password" required autocomplete="new-password" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                        <div class="mt-2">
                            <x-input minlength="8" maxlength="15" id="password_confirmation"
                                class="block mt-1 w-full" type="password" name="password_confirmation" required
                                autocomplete="new-password" />
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-start-1 col-end-4 mb-2">

            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert ">
                <p class="font-bold">RECUERDA</p>
                <p class="text-sm">INTRODUCE UNA CONTRASEÑA PARA ESTE SISTEMA. RECUERDA QUE DEBE TENER AL MENOS 8
                    CARACTERES,INCLUYENDO AL MENOS UNA MAYÚSCULA, UNA MINÚSCULA, UN NÚMERO Y UN CARÁCTER ESPECIAL (#, *,
                    !, @, $, %).</p>
            </div>
        </div>

        <x-validation-errors />

        <div class= "col-start-2 grid place-items:center">
            <x-button class="m-auto ">
                {{ __('Registrar') }}
            </x-button>
        </div>

    </form>
</div>
