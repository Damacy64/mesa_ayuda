<div>
        {{-- @livewire('modal-tickets') --}}

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

        @livewire('tickets-user');
        
    </div>

    <div class="flex items-center justify-center p-4">
        <x-button wire:click="$set('open', true)">
            CREAR TICKET
        </x-button>
    </div>
    </form>
</div>
