<div class="container mx-auto px-4 py-6">
    <table class="w-full text-sm text-left bg-white border">
        <thead class="bg-afac-golden text-white">
            <tr>
                <th class="p-2">Folio</th>
                <th class="p-2">Nombre</th>
                <th class="p-2">Titulo</th>
                <th class="p-2">Dispositivo</th>
                <th class="p-2">Fecha de Creación</th>
                <th class="p-2">Descripción</th>
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
                        <a href="" wire:click.prevent="$dispatch('abrir-modal')" class="text-blue-500 hover:text-blue-700">Actualizar</a>
                    </td>
                </tr>
            @empty
                <tr class="text-black">
                    <td colspan="7" class="text-center py-4">No tiene tickets asignados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Mostrar la paginación --}}
    <div class="mt-4">
        {{ $tickets->links('components.pagination') }}
    </div>
</div>
