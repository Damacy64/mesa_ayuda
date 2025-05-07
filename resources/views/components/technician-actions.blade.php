<div x-data="{ open: false }" class="relative inline-block text-left">
    <x-button @click="open = !open"
        class="inline-flex justify-center w-full rounded-2xl border border-gray-300 shadow-sm px-4 py-2">
        ACCIÓN
        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </x-button>

    <div x-show="open" @click.away="open = false"
        class="z-50 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            @if ($tecnico->estado === 'HABILITADO')
                <button onclick="confirm('¿Estás seguro que deseas deshabilitar este técnico?') || event.stopImmediatePropagation()"
                    wire:click="deshabilitarTecnico({{ $tecnico->id }})" @click="open = false"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left" role="menuitem">
                    Deshabilitar
                </button>
            @else
                <button onclick="confirm('¿Estás seguro que deseas habilitar este técnico?') || event.stopImmediatePropagation()"
                    wire:click="habilitarTecnico({{ $tecnico->id }})" @click="open = false"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left" role="menuitem">
                    Habilitar
                </button>
            @endif
            <button onclick="confirm('¿Estás seguro de eliminar este técnico?') || event.stopImmediatePropagation()"
                wire:click="eliminarTecnico({{ $tecnico->id }})" @click="open = false"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left" role="menuitem">
                Eliminar
            </button>
        </div>
    </div>
</div>