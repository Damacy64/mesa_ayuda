<x-guest-layout>
    <x-header>MESA DE AYUDA</x-header>

    @session('status')
        <div class="flex p-4 mb-4 mt-2 text-sm rounded-lg bg-green-50 text-green-900" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3">
                {{ $value }}
            </div>
        </div>
    @endsession

    <div class="min-h-screen flex flex-col bg-white">
        <div class="container mx-auto p-6 grid grid-cols-1 gap-8 lg:grid-cols-3">
            <div class="flex flex-col justify-center items-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-semibold text-afac-golden text-center">
                    BIENVENIDO
                </h2>
            </div>

            <div class="flex items-center justify-center">
                <form method="POST" action="{{ route('login') }}" class="max-w-md space-y-6">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Correo electrónico') }}" />
                        <x-input maxlength="35" id="email" class="block mt-1 w-full px-8 py-2" type="email"
                            name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div>
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input minlength="8" maxlength="15" id="password" class="block mt-1 w-full px-8 py-2"
                            type="password" name="password" required autocomplete="current-password" />
                    </div>
                    
                    <x-validation-errors />

                    <div class="flex items-center justify-center">
                        <x-button class="flex items-center justify-center">
                            {{ __('INGRESAR') }}
                        </x-button>
                    </div>
                </form>
            </div>

            <div class="flex flex-col justify-center items-center text-center text-sm sm:text-base space-y-8">
                <div>
                    <p class="mb-2">¿Eres usuario nuevo?</p>
                    <a class="underline text-afac-link hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Regístrate') }}
                    </a>
                </div>

                <div>
                    <p class="mb-2">¿Olvidaste tu contraseña?</p>
                    <a class="underline text-afac-link hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Recuperar') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
