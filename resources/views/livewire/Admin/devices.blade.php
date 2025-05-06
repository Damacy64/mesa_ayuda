<x-guest-layout>
    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        <x-slot name="links">
        </x-slot>
    </x-header>

    <div class="container mx-auto px-4 py-6">
        @livewire('admin.devices-assigned')
    </div>
    <div class="flex items-center justify-center p-4">
        <x-button wire:click="$dispatch('abrir-modal')" type="button">
            ASIGNAR
        </x-button>
    </div>
</x-guest-layout>
