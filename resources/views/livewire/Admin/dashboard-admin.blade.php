<div>
    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        <x-slot name="links">
            <a href="/dispositivos" wire:navigate.hover>INICIO</a>
            <a href="/posts" wire:navigate.hover>DISPOSITIVOS</a>
            <a href="/posts" wire:navigate.hover>USUARIOS</a>
            <a href="/posts" wire:navigate.hover>TECNICOS</a>
            <a href="/posts" wire:navigate.hover>ÁREAS</a>
        </x-slot>   
    </x-header>
    <div class="container mx-auto px-4 py-6">
        @livewire('admin.tickets-admin')
    </div>
</div>
