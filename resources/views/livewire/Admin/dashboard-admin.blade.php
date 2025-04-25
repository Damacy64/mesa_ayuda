<div>
    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        <x-slot name="links">
            <a href="{{ route('dashboard') }}" wire:navigate.hover>INICIO</a>
            <a href="{{ route('dispositivos') }}" wire:navigate.hover>DISPOSITIVOS</a>
           
        </x-slot>
        
    </x-header>
    <div class="container mx-auto px-4 py-6">
        @livewire('admin.tickets-admin')
        @livewire('admin.dispositivos')

    </div>
</div>
