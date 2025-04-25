<div >
    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        <x-slot name="title">
            MESA DE AYUDA
        </x-slot>
    </x-header>
    <div class="container mx-auto px-4 py-6">
        @livewire('support.tickets-support')
        @livewire('support.update-ticket-modal')
    </div>
</div>
