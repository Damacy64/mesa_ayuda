<div>
    @if($open)    
    @include('Components/modal-ticket')
    @endif
    <x-header>MESA DE AYUDA</x-header>

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
                    <tr class="border-t">
                        <td class="p-2">001</td>
                        <td class="p-2">Falla en Laptop</td>
                        <td class="p-2">Laptop HP</td>
                        <td class="p-2">2025-04-12</td>
                        <td class="p-2">No enciende</td>
                        <td class="p-2">Abierto</td>
                    </tr>
                </tbody>
            </table>
            <x-pagination> </x-pagination>

            <div>
                <x-button wire:click="$set('open', true)">Crear Ticket</x-button>
            </div>
        </div>
    </div>
</div>
