<x-guest-layout>
    <x-header>MESA DE AYUDA</x-header>

    @session('status')
        <div class="flex p-4 mb-4 mt-2 text-smounded-lg bg-green-50 text-green-900" role="alert">
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

    <div class="h-screen flex flex-col bg-white">
        <div class="p-8 mt-40 grid grid-cols-3 lg:flex-row">
            <div class="flex flex-col justify-center items-center lg:mb-0 lg:w-1/3">
                <h2 class="text-base xs:text-sm sm:text-lg md:text-3xl lg:text-4xl xl:text-5xl font-semibold text-afac-golden text-center lg:m-auto">BIENVENIDO
                </h2>
            </div>
            <div class="flex items-center justify-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="my-8 p-4 ">
                        <x-label for="email" value="{{ __('Correo electronico') }}" />
                        <x-input maxlength="35" id="email" class="block mt-1 max-w-md sm:max-w-lg md:max-w-x2 lg:max-w-3xl xl:max-w-4xl px-2" type="email"
                            name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="my-8 p-4 ">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input minlength="8" maxlength="15" id="password" class="block mt-1 max-w-md sm:max-w-md md:max-w-lg lg:max-w-3xl xl:max-w-4xl px-2"
                            type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <x-button class="ms-4">
                            {{ __('INGRESAR') }}
                        </x-button>
                    </div>
                </form>
            </div>

            <div class="flex justify-center flex-col text-center text-xs sm:text-sm md:text-base lg:text-lg ">
                <div class="my-4 p-4 mt-1">
                    @if (Route::has('password.request'))
                        <p class="mb-2">
                            ¿Eres usuario nuevo?
                        </p>
                        <div>
                            <a class="underline text-afac-link hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
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
                            <a class="underline text-afac-link hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Recuperar') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
