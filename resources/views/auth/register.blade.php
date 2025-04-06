<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nombre(s)*') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="last_name_p" value="{{ __('Apellido Paterno*') }}" />
                <x-input id="last_name_p" class="block mt-1 w-full" type="text" name="last_name_p" :value="old('last_name_p')" required autofocus autocomplete="last_name_p" />
            </div>

            <div>
                <x-label for="last_name_m" value="{{ __('Apellido Materno') }}" />
                <x-input id="last_name_m" class="block mt-1 w-full" type="text" name="last_name_m" :value="old('last_name_m')" autofocus autocomplete="last_name_m" />
            </div>

            <livewire:register-select-location/>

           <livewire:register-select-area/> 

            <div>
                <x-label for="employer_number" value="{{ __('N° empleado*') }}" />
                <x-input id="employer_number" class="block mt-1 w-full" type="text" name="employer_number" :value="old('employer_number')" required autofocus autocomplete="employer_number" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo institucional*') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div>
                <x-label for="email_confirmation" value="{{ __('Confirmar Correo') }}" />
                <x-input id="email_confirmation" class="block mt-1 w-full" type="text" name="email_confirmation" :value="old('email_confirmation')" required autofocus autocomplete="email_confirmation" />
            </div>

            <livewire:register-select-sex/>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña*') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
            <x-validation-errors class="mb-4" />
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
