<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-4 p-4">
        <h1 class="text-2xl font-bold text-black">Historial de tickets</h1>
        <x-search-input>
            <x-input type="text" id="text" name="text" wire:model.live="search" placeholder="Buscar" />
        </x-search-input>
    </div>
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
                        @if ($item->estatus_id === 'CERRADO')
                            <a href="" wire:click.prevent="$dispatch('abrir-modal')"
                                class="text-blue-500 hover:text-blue-700">Actualizar</a>
                        @else
                            <span class="text-gray-500 cursor-not-allowed">Actualizar</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr class="text-black">
                    <td colspan="9" class="text-center py-4">No hay tickets.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $tickets->withQueryString()->links('components.pagination') }}
    </div>
</div>
