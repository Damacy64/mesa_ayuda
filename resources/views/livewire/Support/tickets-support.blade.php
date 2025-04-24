<div class="container mx-auto px-4 py-6">
    <div class="mb-4">
        <x-input type="text" wire:model.live="search" placeholder="Buscar"/>
    </div>
    <table class="w-full text-sm text-left bg-white border">
        <thead class="bg-afac-golden text-white">
            <tr>
                <th class="p-2">Folio</th>
                <th class="p-2">Nombre</th>
                <th class="p-2">Área</th>
                <th class="p-2">Ubicación</th>
                <th class="p-2">Fecha de Creación</th>
                <th class="p-2">Prioridad</th>
                <th class="p-2">Estatus</th>
                <th class="p-2">Acción</th>
            </tr>
        </thead>
        <tbody class="text-black">
            @forelse ($tickets as $item)
                <tr class="border-t">
                    <td class="p-2">{{ $item->folio }}</td>
                    <td class="p-2">{{ $item->nombre_usuario }}</td>
                    <td class="p-2">{{ $item->area }}</td>
                    <td class="p-2">{{ $item->ubicacion }}</td>
                    <td class="p-2">{{ $item->fecha_creacion }}</td>
                    <td class="p-2">{{ $item->prioridad }}</td>
                    <td class="p-2">{{ $item->estatus }}</td>
                    <td class="p-2">
                        <a href="" wire:click.prevent="abrirModal( {{$item->folio}} )" class="text-blue-500 hover:text-blue-700">Actualizar</a>
                    </td>
                </tr>
            @empty
                <tr class="text-black">
                    <td colspan="7" class="text-center py-4">No hay tickets.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Mostrar la paginación --}}
    <div class="mt-4">
        {{ $tickets->links('components.pagination') }}
    </div>
</div>
