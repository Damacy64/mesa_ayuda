<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ticket;
use Livewire\Attributes\On;

class TicketsUser extends Component
{
    use WithPagination;

    #[On('ticketCreated')] 
    
    public function render()
    {
        return view('livewire.tickets-user', [
            'tickets' => Ticket::orderBy('folio', 'desc')->paginate(5),
        ]);
    }
}
