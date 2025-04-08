<x-guest-layout>
    <x-header>MESA DE AYUDA</x-header>
        <!-- <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot> -->

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <div class="h-screen flex flex-col bg-white">
            <div class="p-8 mt-40 grid grid-cols-3 lg:flex-row">
                <div class="flex flex-col justify-center items-center lg:mb-0 lg:w-1/3">
                    <h2 class="lg:text-6xl sm:text-4xl font-semibold text-afac-golden text-center lg:m-auto">BIENVENIDO</h2>
                </div>
                <div class="flex items-center justify-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="my-8 p-4 w-80">
                            <x-label for="email" value="{{ __('Correo electronico') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div  class="my-8 p-4 w-80">
                            <x-label for="password" value="{{ __('Contraseña') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ms-4">
                                {{ __('INGRESAR') }}
                            </x-button>
                        </div>
                    </form>
                </div>
                <div class="flex justify-center flex-col text-center">
    <div class="my-4 p-4 mt-1">
        @if (Route::has('password.request'))
            <p class="mb-2">
                ¿Eres usuario nuevo?
            </p>
            <div>
                <a class="underline text-sm text-afac-link hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('register') }}">
                    {{ __('Registrate') }}
                </a>
            </div>
        @endif
    </div>

    <div class="my-8 p-4 mt-1">
        @if (Route::has('password.request'))
            <p class="mb-2">
                ¿Olvidaste tu contraseña?
            </p>
            <div>
                <a class="underline text-sm text-afac-link hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Recuperar') }}
                </a>
            </div>
        @endif
    </div>
</div>
</x-guest-layout>