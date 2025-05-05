<x-guest-layout>
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
                <x-input type="text" id="text" name="text" wire:model.live="search" placeholder="Buscar" />
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
                    @foreach ($usuarios as $usuario)
                    <tr class="border-t">
                        <td class="p-2">{{ $usuario->user->employer_number }}</td>
                        <td class="p-2">{{ $usuario->user->name }}</td>
                        <td class="p-2">{{ $usuario->user->email }}</td>
                        <td class="p-2">{{ $usuario->location->piso }}</td>
                        <td class="p-2">{{ $usuario->area->nombre }}</td>
                        <td class="p-2">{{ $usuario->user->gender->sexo }}</td>
                        <td class="p-2">
                            @if ($usuario->estado === 'HABILITADO')
                                <a href="" wire:click.prevent=""
                                    class="text-blue-500 hover:text-blue-700">Eliminar</a>
                            @else
                                <span class="text-gray-500 cursor-not-allowed">Eliminar</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach   
                </tbody>
            </table>
        </div>
    </div>
</x-guest-layout>
