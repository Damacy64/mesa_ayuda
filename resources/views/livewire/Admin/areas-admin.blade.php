<div>
    <div class="flex items-center justify-end mb-4 p-4">
        <x-search-input>
            <x-input name="busqueda" type="text" wire:model.live="search" placeholder="Buscar" />
        </x-search-input>
    </div>
    
    @livewire('admin.agregar-area')
    <div class="overflow-x-auto mb-6">
        <table class="w-full text-sm text-left bg-white border">
            <thead class="bg-afac-golden text-white">
                <tr>
                    <th class="p-2">id</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Descripción</th>
                    <th class="p-2">Acción</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @forelse ($areas as $item)
                    <tr class="border-t">
                        <td class="p-2">{{ $loop->iteration }}</td>
                        <td class="p-2">{{ $item->nombre }}</td>
                        <td class="p-2">{{ $item->descripcion }}</td>
                        <td class="p-2">
                            <a href="#" 
                            onclick="confirm('¿Estás seguro de eliminar esta área?') || event.stopImmediatePropagation()" 
                            wire:click="ocultar('{{ $item->nombre }}')" 
                            class="text-blue-500 hover:text-red-700">
                            Eliminar
                         </a>
                        </td>
                    </tr>
                @empty
                    <tr class="text-black">
                        <td colspan="4" class="text-center py-4">No hay Áreas.</td>
                    </tr>
                @endforelse
            </tbody>
            
        </table>
    </div>

    <div class="flex items-center justify-center p-4">
        <x-button wire:click="$dispatch('abrir-modal')" type="button">
            AGREGAR
        </x-button>
    </div>
    
    <div class="mt-4">
        {{ $areas->links('components.pagination') }}
    </div>
</div>
