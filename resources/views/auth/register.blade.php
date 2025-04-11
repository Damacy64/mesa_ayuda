<x-guest-layout>
    <x-header>REGISTRO USUARIO</x-header>

        <form method="POST" action="{{ route('register') }}" class="container mx-auto p-6 grid grid-cols-1 md:grid-cols-3 grid-rows-5 gap-4 w-4/6 mt-20">
            @csrf
                <div>
                    <x-label for="name" value="{{ __('Nombre(s)*') }}" />
                    <x-input maxlength="50" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                </div>

                <div>
                    <x-label for="last_name_p" value="{{ __('Apellido Paterno*') }}" />
                    <x-input maxlength="30" id="last_name_p" class="block mt-1 w-full" type="text" name="last_name_p"
                        :value="old('last_name_p')" required autofocus autocomplete="last_name_p" />
                </div>

                <div>
                    <x-label for="last_name_m" value="{{ __('Apellido Materno') }}" />
                    <x-input maxlength="30" id="last_name_m" class="block mt-1 w-full" type="text" name="last_name_m"
                        :value="old('last_name_m')" autofocus autocomplete="last_name_m" />
                </div>

        <livewire:register-select-location />

        <livewire:register-select-area />

        <div>
            <x-label for="employer_number" value="{{ __('N° empleado*') }}" />
            <x-input maxlength="7" id="employer_number" class="block mt-1 w-full" type="text" name="employer_number"
                :value="old('employer_number')" required autofocus autocomplete="employer_number" />
        </div>

                <div>
                    <x-label for="email" value="{{ __('Correo institucional*') }}" />
                    <x-input maxlength="35" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                </div>

                <div>
                    <x-label for="email_confirmation" value="{{ __('Confirmar Correo') }}" />
                    <x-input maxlength="35" id="email_confirmation" class="block mt-1 w-full" type="text" name="email_confirmation"
                        :value="old('email_confirmation')" required autofocus autocomplete="email_confirmation" />
                </div>

        <livewire:register-select-sex />

        <div>
            <x-label for="password" value="{{ __('Contraseña*') }}" />
            <x-input minlength="8" maxlength="15" id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="new-password" />
        </div>

        <div>
            <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
            <x-input minlength="8" maxlength="15" id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ms-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' =>
                                    '<a target="_blank" href="' .
                                    route('terms.show') .
                                    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                    __('Terms of Service') .
                                    '</a>',
                                'privacy_policy' =>
                                    '<a target="_blank" href="' .
                                    route('policy.show') .
                                    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                    __('Privacy Policy') .
                                    '</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
        @endif
        <div class="col-start-1 col-end-4 ">
            {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('¿Ya estas registrado?') }}
                    </a> --}}

                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert ">
                        <p class="font-bold">RECUERDA</p>
                        <p class="text-sm">INTRODUCE UNA CONTRASEÑA PARA ESTE SISTEMA. RECUERDA QUE DEBE TENER AL MENOS 8 CARACTERES,INCLUYENDO AL MENOS UNA MAYÚSCULA, UNA MINÚSCULA, UN NÚMERO Y UN CARÁCTER ESPECIAL (#, *, !, @, $, %).</p>
                      </div>
                    </div>

        <div class= "col-start-2 grid place-items:center">
            <x-button class="m-auto ">
                {{ __('Registrar') }}
            </x-button>
        </div>

    </form>
</x-guest-layout>
