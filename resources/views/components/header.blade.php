<div class="bg-afac-blue text-white p-6 sm:p-08 md:p-10 lg:p-12 w-full flex items-center justify-center relative">

    <img class="h-16 sm:h-18 md:h-24 left-6 absolute"
        src="https://testing-ventanillas.afac-avciv.com/images/isologo_AFAC_white.png" alt="Logo">

    @isset($title)
        <h1 class="text-2x1 sm:text-3xl md:text-4xl lg:text-5xl xl:text-6x1 text-afac-golden font-bold text-center w-full">
            {{ $title }}
        </h1>
    @endisset

    @isset($links)
        <div x-data="{ open: false }" class="w-full mt-6">
            <div class="flex justify-end sm:hidden">
                <button @click="open = !open" class="text-afac-golden focus:outline-none">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div :class="{ 'block': open, 'hidden': !open }"
                class="flex flex-col sm:flex-row flex-wrap gap-6 sm:gap-4 justify-center w-full font-semibold text-afac-golden mt-4 sm:mt-0 sm:flex sm:pl-24">

                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('INICIO') }}
                </x-nav-link>
                <x-nav-link href="{{ route('devices') }}" :active="request()->routeIs('devices')">
                    {{ __('DISPOSITIVOS') }}
                </x-nav-link>
                <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                    {{ __('USUARIOS') }}
                </x-nav-link>
                <x-nav-link href="{{ route('technical') }}" :active="request()->routeIs('technical')">
                    {{ __('TECNICOS') }}
                </x-nav-link>
                <x-nav-link href="{{ route('areas') }}" :active="request()->routeIs('areas')">
                    {{ __('ÁREAS') }}
                </x-nav-link>
            </div>
        </div>
    @endisset


    @isset($logout)
        {{ $logout }}
    @endisset
</div>
