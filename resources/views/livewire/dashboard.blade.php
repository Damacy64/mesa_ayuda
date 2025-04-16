<div>
    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        MESA DE AYUDA
    </x-header>

    <div>
        <div class="flex items-center mb-4 p-4">
            <h1 class="text-2xl font-bold text-black">Historial de tickets</h1>
        </div>

        <div class="container mx-auto px-4 py-6">
            <table class="w-full text-sm text-left bg-white border">
                <thead class="bg-afac-golden text-white">
                    <tr>
                        <th class="p-2">Folio</th>
                        <th class="p-2">Título</th>
                        <th class="p-2">Dispositivo</th>
                        <th class="p-2">Fecha de creación</th>
                        <th class="p-2">Descripción</th>
                        <th class="p-2">Estado</th>
                    </tr>
                </thead>
                <tbody class="text-black">
                    @forelse ($tickets as $ticket)
                    <tr class="border-t">
                        <td class="p-2">{{ $ticket->folio }}</td>
                        <td class="p-2">{{ $ticket->titulo}}</td>
                        <td class="p-2">{{ $ticket->equipo_id}}</td>
                        <td class="p-2">{{ $ticket->created_at}}</td>
                        <td class="p-2">{{ $ticket->descripcion}}</td>
                        <td class="p-2">{{ $ticket->estatus_id}}</td>
                    </tr>
                    @empty
                        <tr class="text-black">
                            <td colspan="6" class="text-center py-4">No hay tickets disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- <div class="mt-4 text-center text-black">
            <span>
                <div class="container mx-auto border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                    <div class="flex flex-1 justify-between sm:hidden">
                        <a href="#"
                            class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                        <a href="#"
                            class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                    </div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-xs" aria-label="Pagination">
                        <a href="#"
                            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" aria-current="page"
                            class="relative z-10 inline-flex items-center bg-afac-blue px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                        <a href="#"
                            class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                        <span
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-gray-300 ring-inset focus:outline-offset-0">...</span>
                        <a href="#"
                            class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                        <a href="#"
                            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </span>
        </div> --}}
    </div>
    <div class="flex items-center justify-center p-4">
        <x-button>
            CREAR TICKET
        </x-button>
    </div>
    </form>
</div>
