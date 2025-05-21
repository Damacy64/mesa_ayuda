<div>
    @livewire('support.update-ticket-modal')
    <div class="flex items-center justify-between mb-4 p-4">
        <h1 class="text-2xl font-bold text-black">Resumen de tickets</h1>
        <x-search-input>
            <x-input name="busqueda" type="text" wire:model.live="search" placeholder="Buscar" />
        </x-search-input>
    </div>
    <div class="overflow-x-auto mb-6">
        <table class="w-full text-sm text-left bg-white border">
            <thead class="bg-afac-golden text-white">
                <tr>
                    <th class="p-2">Folio</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Área</th>
                    <th class="p-2">Ubicación</th>
                    <th class="p-2 cursor-pointer select-none" wire:click="sortBy('created_at')">Fecha de creación
                        @if ($sortField === 'created_at')
                            @if ($sortDirection === 'asc')
                                ▲
                            @else
                                ▼
                            @endif
                        @endif
                    </th>
                    <th class="p-2">Prioridad</th>
                    <th class="p-2">Estatus</th>
                    <th class="p-2">Tiempo de Resolución</th>
                    <th class="p-2">Acción</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @forelse ($tickets as $item)
                    <tr class="border-t">
                        <td class="p-2">{{ $item->folio }}</td>
                        <td class="p-2">{{ $item->usuario->user->name }}</td>
                        <td class="p-2">{{ $item->usuario->area->nombre }}</td>
                        <td class="p-2">{{ $item->usuario->ubicacion_id }}</td>
                        <td class="p-2">{{ $item->created_at }}</td>
                        <td class="p-2">{{ $item->prioridad_id }}</td>
                        <td class="p-2">{{ $item->estatus_id }}</td>
                        <td class="p-2">{{ $item->tiempo_solucion }}</td>
                        <td class="p-2">
                            @if ($item->estatus_id === 'ABIERTO' || $item->estatus_id === 'EN REVISIÓN')
                                <a href="" wire:click.prevent="abrirModal( {{ $item->folio }} )"
                                    class="text-blue-500 hover:text-blue-700">Actualizar</a>
                            @else
                                <span class="text-gray-500 cursor-not-allowed">Actualizar</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="text-black">
                        <td colspan="8" class="text-center py-4">No hay tickets.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <div wire:ignore>
            {{ $tickets->links('components.pagination') }}
        </div>
    </div>
</div>
