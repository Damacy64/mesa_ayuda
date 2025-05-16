<div>
    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        <x-slot name="links">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex ">
                <x-nav-link />
            </div>
        </x-slot>
    </x-header>

    @livewire('admin.agregar-tecnico-modal')

    <div class="container mx-auto px-4 py-6">
        <div class="flex items-center justify-between mb-4 p-4">
            <h1 class="text-2xl font-bold text-black">Administrar Tecnicos</h1>
            <x-search-input>
                <x-input type="text" id="busqueda" name="busqueda" wire:model.live="search" placeholder="Buscar" />
            </x-search-input>
        </div>

        <div class="flex items-center justify-between mb-4 p-4">
            <button wire:click="agregarTecnicoModal" class="inline-flex justify-center px-4 py-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-add mr-2 h-5 w-5" viewBox="0 0 16 16">
                    <path
                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                    <path
                        d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                </svg>
                Agregar
            </button>
        </div>

        <div class="overflow-x-auto mb-6">
            <table class="w-full text-sm text-left bg-white border">
                <thead class="bg-afac-golden text-white">
                    <tr>
                        <th class="p-2">#Empleado</th>
                        <th class="p-2">Nombre</th>
                        <th class="p-2">Correo</th>
                        <th class="p-2">Horario</th>
                        <th class="p-2">Acción</th>
                    </tr>
                </thead>
                <tbody class="text-black">
                    @forelse ($tecnicos as $tecnico)
                        <tr class="border-t">
                            @if ($tecnico->estado === 'DESHABILITADO')
                                <td class="p-2 text-red-600 font-black">{{ $tecnico->user->employer_number }}</td>
                                <td class="p-2 text-red-600 font-black">{{ $tecnico->user->name }}</td>
                                <td class="p-2 text-red-600 font-black">{{ $tecnico->user->email }}</td>
                                <td class="p-2 text-red-600 font-black">{{ $tecnico->hora_entrada }}</td>
                                <td class="p-2">
                                    <x-technician-actions :tecnico="$tecnico" />
                                </td>
                            @else
                                @if ($tecnico->estado === 'HABILITADO')
                                    <td class="p-2">{{ $tecnico->user->employer_number }}</td>
                                    <td class="p-2">{{ $tecnico->user->name }}</td>
                                    <td class="p-2">{{ $tecnico->user->email }}</td>
                                    <td class="p-2">{{ $tecnico->hora_entrada }} - {{$tecnico->hora_salida}}</td>
                                    <td class="p-2">
                                        <x-technician-actions :tecnico="$tecnico" />
                                    </td>
                                @endif
                            @endif

                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4">No se encontraron resultados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between mb-4 p-4">
            <h2 class="text-2xl font-bold text-black">Total de Tecnicos: {{ $totalTecnicos }}</h2>
        </div>

        <div class="mt-4">
            {{ $tecnicos->links('components.pagination') }}
        </div>
    </div>
</div>
