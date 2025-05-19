<div>
    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        <x-slot name="links">
        
        </x-slot>
        
    </x-header>
    <div class="container mx-auto px-4 py-6">
        @livewire('admin.tickets-admin')
        @livewire('admin.estadisticas-modal')
    </div>
</div>
