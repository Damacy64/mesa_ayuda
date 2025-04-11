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
</div>


 