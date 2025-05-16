<div>
    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        <x-slot name="links">
        </x-slot>
    </x-header>
    <div class="container mx-auto px-4 py-6">
        <div class="flex items-center justify-between mb-4 p-4">
            <h1 class="text-2xl font-bold text-black">Administrar Usuarios</h1>
            <x-search-input>
                <x-input type="text" id="busqueda" name="busqueda" wire:model.live="search" placeholder="Buscar" />
            </x-search-input>
        </div>

        <div class="overflow-x-auto mb-6">
            <table class="w-full text-sm text-left bg-white border">
                <thead class="bg-afac-golden text-white">
                    <tr>
                        <th class="p-2">#Empleado</th>
                        <th class="p-2">Nombre</th>
                        <th class="p-2">Correo</th>
                        <th class="p-2">Ubicación</th>
                        <th class="p-2">Área</th>
                        <th class="p-2">Sexo</th>
                        <th class="p-2">Acción</th>
                    </tr>
                </thead>
                <tbody class="text-black">
                    @forelse ($usuarios as $usuario)
                        <tr class="border-t">
                            @if ($usuario->estado === 'HABILITADO')
                                <td class="p-2">{{ $usuario->user->employer_number }}</td>
                                <td class="p-2">{{ $usuario->user->name }}</td>
                                <td class="p-2">{{ $usuario->user->email }}</td>
                                <td class="p-2">{{ $usuario->ubicacion_id }}</td>
                                <td class="p-2">{{ $usuario->area_id }}</td>
                                <td class="p-2">{{ $usuario->user->gender->sexo }}</td>
                                <td class="p-2">
                                    <a href="" 
                                        onclick="confirm('¿Estás seguro de eliminar este usuario?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="eliminarUsuario({{ $usuario->id }})"
                                        class="text-blue-500 hover:text-red-700">Eliminar</a>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center p-4">No se encontraron resultados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between mb-4 p-4">
            <h2 class="text-2xl font-bold text-black">Total de Usuarios: {{ $totalUsuarios }}</h2>
        </div>

        <div class="mt-4">
            {{ $usuarios->links('components.pagination') }}
        </div>
    </div>
</div>
