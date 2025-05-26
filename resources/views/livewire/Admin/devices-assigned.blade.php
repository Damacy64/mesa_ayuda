<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-end mb-4 p-4">
        <x-search-input>
            <x-input type="text" id="text" name="text" wire:model.live="search" placeholder="Buscar" />
        </x-search-input>
    </div>

    @livewire('admin.asignar-modal')
    @livewire('admin.detalles-modal')
    @livewire('admin.historial-modal')

    <div class="overflow-x-auto mb-6">
        <table class="w-full text-sm text-left bg-white border">
            <thead class="bg-afac-golden text-white">
                <tr>
                    <th class="p-2">#Empleado</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Área</th>
                    <th class="p-2">Ubicación</th>
                    <th class="p-2">Numero de Inventario</th>
                    <th class="p-2">Numero de Serie</th>
                    <th class="p-2">Dispositivo</th>
                    <th class="p-2">Modelo</th>
                    <th class="p-2">Marca</th>
                    <th class="p-1 cursor-pointer select-none" wire:click="sortBy('fecha_asignacion')">Fecha Asignación ▲▼</th>
                    <th class="p-2">Acción</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @forelse ($computers as $item)
                    <tr class="border-t">
                        <td class="p-2">{{ $item->user->employer_number }}</td>
                        <td class="p-2">{{ $item->user->name }}</td>
                        <td class="p-2">
                            {{ $item->user->userFinal->area_id ?? 'DIRECCIÓN DE DESARROLLO ESTRATÉGICO' }}</td>
                        <td class="p-2">{{ $item->user->userFinal->ubicacion_id ?? 'Piso 3' }}</td>
                        <td class="p-2">{{ $item->equipo->numero_inventario }}</td>
                        <td class="p-2">{{ $item->equipo->numero_serie }}</td>
                        <td class="p-2">{{ $item->equipo->tipo_dispositivo }}</td>
                        <td class="p-2">{{ $item->equipo->modelo }}</td>
                        <td class="p-2">{{ $item->equipo->marca }}</td>
                        <td class="p-2">{{ $item->fecha_asignacion }}</td>
                        <td class="p-2">
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <x-button @click="open = !open"
                                    class="inline-flex justify-center w-full rounded-2xl border border-gray-300 shadow-sm px-4 py-2">
                                    ACCIÓN
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </x-button>

                                <div x-show="open" @click.away="open = false"
                                    class="z-50 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-1" role="menu" aria-orientation="vertical"
                                        aria-labelledby="options-menu">
                                            <button
                                                onclick="confirm('¿Estás seguro de eliminar el dispositivo?') || event.stopImmediatePropagation()"
                                                wire:click="eliminar({{ $item->equipo->numero_serie }})"
                                                @click="open = false"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                                role="menuitem">
                                                Eliminar
                                            </button>
                                            
                                            <button
                                                wire:click="detalles({{ $item->equipo->numero_serie }})"
                                                @click="open = false"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                                role="menuitem">
                                                Ver Detalles
                                            </button>

                                            <button
                                                wire:click="historial({{ $item->equipo->numero_serie }})"
                                                @click="open = false"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                                role="menuitem">
                                                Ver Historial
                                            </button>
                                            
                                            {{-- <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                                role="menuitem" wire:click="exportarPDF">Descargar Formato</button> --}}
                                                                                    {{--  esto es para ver la vista pdf --}}
                                    <a href="{{ route('admin.formato') }}" 
                                        target="_blank"
                                        class="inline-block bg-afac-blue text-white py-2 px-4 rounded-lg hover:bg-afac-golden">
                                        DESCARGAR
                                     </a>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-black">
                        <td colspan="11" class="text-center py-4">No hay dispositivos asignados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="flex items-center justify-center p-4">
        <x-button wire:click="asignarModal" type="button">
            ASIGNAR
        </x-button>
    </div>
    <div class="mt-4" wire:ignore>
        {{ $computers->withQueryString()->links('components.pagination') }}
    </div>
</div>
