<div class="container mx-auto px-4 py-6">
    <table class="w-full text-sm text-left bg-white border">
        <thead class="bg-afac-golden text-white">
            <tr>
                <th class="p-2">N°</th>
                <th class="p-2">Tipo de Equipo</th>
                <th class="p-2">Marca</th>
                <th class="p-2">Número de Serie</th>
                <th class="p-2">Sistema Operativo</th>
                <th class="p-2">Elija su Equipo</th>
            </tr>
        </thead>
        <tbody class="text-black">
            @forelse ($datos as $item)
                    <tr class="border-t">
                        <td class="p-2">{{ $item->user_id }}</td>
                        <td class="p-2">{{ $item->tipo_equipo ?? 'N/A' }}</td>
                        <td class="p-2">{{ $item->marca ?? 'N/A' }}</td>
                        <td class="p-2">{{ $item->numero_serie }}</td>
                        <td class="p-2">{{ $item->version_windows }}</td>
                        <td class="p-2"><input type="radio" wire:model.live="equipo" name="equipo" class="accent-blue-500 mx-auto block"  value="{{ $item->numero_serie }}"/></td>
                    </tr>
            @empty
                <tr class="text-black">
                    <td colspan="6" class="text-center py-4">No tiene equipos disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
