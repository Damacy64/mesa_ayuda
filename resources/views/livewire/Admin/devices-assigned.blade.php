<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-end mb-4 p-4">
        <x-search-input>
            <x-input type="text" id="text" name="text" wire:model.live="search" placeholder="Buscar" />
        </x-search-input>
    </div>

    
    @livewire('admin.asignar-modal')

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
                    <th class="p-2">Fecha Asignación</th>
                    <th class="p-2">Acción</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @forelse ($computers as $item)
                    <tr class="border-t">
                        <td class="p-2">{{ $item->userFinal->user->employer_number }}</td>
                        <td class="p-2">{{ $item->userFinal->user->name }}</td>
                        <td class="p-2">{{ $item->userFinal->area_id }}</td>
                        <td class="p-2">{{ $item->userFinal->ubicacion_id }}</td>
                        <td class="p-2">{{ $item->equipo->numero_inventario }}</td>
                        <td class="p-2">{{ $item->equipo->numero_serie }}</td>
                        <td class="p-2">{{ $item->equipo->tipo_dispositivo }}</td>
                        <td class="p-2">{{ $item->equipo->modelo }}</td>
                        <td class="p-2">{{ $item->equipo->marca }}</td>
                        <td class="p-2">{{ $item->fecha_asignacion }}</td>
                        <td class="p-2">
                            <a href="#" 
                            onclick="confirm('¿Estás seguro de eliminar el dispositivo?') || event.stopImmediatePropagation()" 
                            wire:click="ocultar('{{ $item->nombre }}')" 
                            class="text-blue-500 hover:text-red-700">
                            Eliminar
                         </a>
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
    <div class="mt-4">
        {{ $computers->withQueryString()->links('components.pagination') }}
    </div>
</div>

