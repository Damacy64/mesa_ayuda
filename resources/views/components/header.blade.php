<div class="bg-afac-blue text-white p-6 sm:p-08 md:p-10 lg:p-12 w-full flex items-center justify-center relative">
    <img class="h-16 sm:h-18 md:h-24 left-6 absolute"
        src="https://testing-ventanillas.afac-avciv.com/images/isologo_AFAC_white.png" alt="Logo">
    <h1 class="text-2x1 sm:text-3xl md:text-4xl lg:text-5x1 xl:text-6x1 text-afac-golden font-bold text-center ">
        {{ $slot }}
    </h1>

    <div class="ms-3 relative">
        @isset($logout)
            {{ $logout }}
        @endisset
    </div>
</div>
