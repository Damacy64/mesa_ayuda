<div>
    <x-header>
        <x-slot name="logout">
            <x-dropdown align="right" width="48" />
        </x-slot>
        <nav>
            <a href="/dispositivos" wire:navigate.hover>Posts</a>
            <a href="/posts" wire:navigate.hover>Posts</a>
            <a href="/posts" wire:navigate.hover>Posts</a>

        </nav>    
    </x-header>
    <div class="container mx-auto px-4 py-6">
        @livewire('admin.tickets-admin')
       
    </div>
</div>
