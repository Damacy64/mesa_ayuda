<div>
    @livewire('user.modal', ['equipos' => $equipos])

    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        <x-slot name="title">
            MESA DE AYUDA
        </x-slot>
    </x-header>

    <div class="container mx-auto px-4 py-6">
        @livewire('user.tickets-user')
    </div>

    <div class="flex items-center justify-center p-4">
        <x-button wire:click="$dispatch('abrir-modal')" type="button">
            CREAR TICKET
        </x-button>
    </div>
</div>
