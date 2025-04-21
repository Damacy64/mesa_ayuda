<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Component;

class TicketsUser extends Component
{

    use WithPagination;

    // public function getListeners()
    // {
    //     return [
    //         'ticketCreated' => 'refreshTickets',
    //     ];
    // }

    #[On('ticketCreated')]


    public function render()
    {
        return view('livewire.tickets-user', [
            'tickets' => Ticket::orderBy('folio', 'asc')->paginate(5),
        ]);
    }
}
