<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h1 class="mb-6 text-center text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold">
                Solicitud de Recuperación de Contraseña
            </h1>
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-justify sm:text-base">
            ¿Olvidaste tu contraseña? No hay problema. Simplemente indícanos tu correo electrónico y te enviaremos un
            enlace para restablecerla y podrás elegir una nueva.
        </div>

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
                    <span class="uppercase">{{ $value }}</span>
                </div>
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <div>
                <x-label for="email" value="Ingrese su Correo" />
                <x-input maxlength="35" id="email" class="block mt-1 w-full max-w-full sm:max-w-md" type="email"
                    name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-center">
                <x-button class="flex items-center justify-center sm:w-auto">
                    ENVIAR
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
