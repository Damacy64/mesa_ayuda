<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-4 p-4">
        <h1 class="text-2xl font-bold text-black">Historial de tickets</h1>
        <x-search-input>
            <x-input type="text" id="text" name="text" wire:model.live="search" placeholder="Buscar" />
        </x-search-input>
    </div>

    <div class="overflow-x-auto mb-6">
        <table class="w-full text-sm text-left bg-white border">
            <thead class="bg-afac-golden text-white">
                <tr>
                    <th class="p-2">#Empleado</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Tipo de Ticket</th>
                    <th class="p-2">Tipo de Falla</th>
                    <th class="p-2">Fecha de Creación</th>
                    <th class="p-2">Prioridad</th>
                    <th class="p-2">Estatus</th>
                    <th class="p-2">Técnico Asignado</th>
                    <th class="p-2">Acción</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @forelse ($tickets as $item)
                    <tr class="border-t">
                        <td class="p-2">{{ $item->folio }}</td>
                        <td class="p-2">{{ $item->usuario->user->name }}</td>
                        <td class="p-2">{{ $item->tipo_ticket }}</td>
                        <td class="p-2">{{ $item->tipo_falla ?? 'N/A' }}</td>
                        <td class="p-2">{{ $item->created_at }}</td>
                        <td class="p-2">{{ $item->prioridad_id }}</td>
                        <td class="p-2">{{ $item->estatus_id }}</td>
                        <td class="p-2">{{ $item->tecnico->user->name }}</td>
                        <td class="p-2">
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <!-- Botón principal -->
                                <x-button @click="open = !open"
                                    class="inline-flex justify-center w-full rounded-2xl border border-gray-300 shadow-sm px-4 py-2 ">
                                    ACCIÓN
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </x-button>

                                <!-- Dropdown -->
                                <div x-show="open" @click.away="open = false"
                                    class="z-50 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-1" role="menu" aria-orientation="vertical"
                                        aria-labelledby="options-menu">
                                        <!-- Opción 1 -->
                                        <button wire:click="abrirModal( {{ $item->folio }} )"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                            role="menuitem">
                                            Revisión
                                        </button>
                                        <!-- Opción 2 -->
                                        <button wire:click="cerrarTicket({{ $item->folio }})"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                            role="menuitem">
                                            Cerrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-black">
                        <td colspan="9" class="text-center py-4">No hay tickets.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $tickets->withQueryString()->links('components.pagination') }}
    </div>
</div>
