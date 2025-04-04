<x-guest-layout>

    <x-header> MESA DE AYUDA </x-header>

    @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
    @endsession

    <div class="h-screen flex flex-col bg-white">
        <div class="p-8 mt-20 grid grid-cols-3 gap-4">

            <div class="flex flex-col justify-center items-center">
                <h2 class="text-xl font-semibold text-afac-golden font-si">BIENVENIDO</h2>
            </div>


            <div class="flex flex-col items-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <x-label for="email" value="{{ __('Correo electronico') }}" />
                        <x-input id="email" type="email" name="email" :value="old('email')"
                            required autofocus autocomplete="username" />
                    </div>

                    <div class="mb-4">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input id="password" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>

                    {{-- <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div> --}}

                    <div class="flex justify-center">
                                                
                        <x-button>
                            {{ __('INGRESAR') }}
                        </x-button>
                    </div>
                </form>
                <x-validation-errors class="mb-4" />
            </div>


            <div class="flex flex-col justify-center items-end">
                <div class="text-center">
                    <span class="block">¿Eres usuario nuevo?</span>
                    <a href="/registro" class="text-afac-link hover:underline mb-2">Regístrate</a>
                </div>
                <div class="text-center">
                    <span class="block">¿Olvidaste tu contraseña?</span>
                    <a href="/forgot-password" class="text-afac-link hover:underline">Recuperar</a>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>
