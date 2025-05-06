<div>
    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        <x-slot name="links">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex ">
                <x-nav-link/>
            </div>
        </x-slot>
    </x-header>
    <div class="container mx-auto px-4 py-6">
        <div class="flex items-center justify-between mb-4 p-4">
            <h1 class="text-2xl font-bold text-black">Administrar Tecnicos</h1>
            <x-search-input>
                <x-input type="text" id="busqueda" name="busqueda" wire:model.live="search" placeholder="Buscar" />
            </x-search-input>
        </div>

        <div class="flex items-center justify-between mb-4 p-4">
            <button>
                Agregar
            </button>
        </div>

        <div class="overflow-x-auto mb-6">
            <table class="w-full text-sm text-left bg-white border">
                <thead class="bg-afac-golden text-white">
                    <tr>
                        <th class="p-2">#Empleado</th>
                        <th class="p-2">Nombre</th>
                        <th class="p-2">Correo</th>
                        <th class="p-2">Disponibilidad</th>
                        <th class="p-2">Acción</th>
                    </tr>
                </thead>
                <tbody class="text-black">
                    @forelse ($tecnicos as $tecnico)
                    <tr class="border-t">
                        <td class="p-2">{{$tecnico->user->employer_number}}</td>
                        <td class="p-2">{{$tecnico->user->name}}</td>
                        <td class="p-2">{{$tecnico->user->email}}</td>
                        <td class="p-2">{{$tecnico->disponibilidad}}</td>
                        <td class="p-2">
                            {{-- Boton principal --}}
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <x-button @click="open = !open"
                                    class="inline-flex justify-center w-full rounded-2xl border border-gray-300 shadow-sm px-4 py-2 ">
                                    ACCIÓN
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </x-button>

                                {{-- Botones secundarios --}}
                                <div x-show="open" @click.away="open = false" class="z-50 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <button wire:click="" @click="open = false"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                            role="menuitem">
                                            Deshabilitar
                                        </button>
                                        <button wire:click="" @click="open = false"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                            role="menuitem">
                                            Habilitar
                                        </button>
                                        <button wire:click="" @click="open = false"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                            role="menuitem">
                                            Eliminar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4">No se encontraron resultados.</td>
                        </tr>
                    @endforelse   
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between mb-4 p-4">
            <h2 class="text-2xl font-bold text-black">Total de Tecnicos: {{$totalTecnicos}}</h2>
        </div>

        <div class="mt-4">
            {{ $tecnicos->links('components.pagination') }}
        </div>
    </div>
</div>
