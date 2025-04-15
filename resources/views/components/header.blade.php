{{-- <div class="bg-afac-blue text-white p-6 w-full flex items-center relative">
    <img  class="h-32 left-6" src="https://testing-ventanillas.afac-avciv.com/images/isologo_AFAC_white.png" alt="Logo ">
    <div class="flex-1 flex justify-center">
        <h1 class="text-6xl text-afac-golden font-bold ">{{ $slot }}</h1>
    </div>
</div> --}}
    
<div class="bg-afac-blue text-white p-6 sm:p-08 lg:p-12 w-full flex items-center justify-center relative">
    <img class="h-16 sm:h-20 md:h-24 left-6 absolute" src="https://testing-ventanillas.afac-avciv.com/images/isologo_AFAC_white.png" alt="Logo">
    <h1 class="text-3x1 sm:text-4xl md:text-5xl lg:text-6xl text-afac-golden font-bold text-center w-full">
        {{ $slot }}
    </h1>

    <div class="ms-3 relative">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>
                @else
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-afac-blue hover:text-white focus:outline-none focus:bg-afac-golden active:bg-afac-golden transition ease-in-out duration-150">
                            {{-- {{ Auth::user()->name }} --}}

                            <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                @endif
            </x-slot>

            <x-slot name="content">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-dropdown-link href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                        {{ __('Cerrar sesión') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</div>


 