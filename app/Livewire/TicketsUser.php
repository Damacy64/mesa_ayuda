<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class TicketsUser extends Component
{
    public $tickets;

    public function mount()
    {
        $this->tickets = Ticket::latest()->get();
    }

    public function getListeners()
    {
        return [
            'ticketCreated' => 'refreshTickets',
        ];
    }

    public function refreshTickets()
    {
        $this->tickets = Ticket::latest()->get();
    }

    public function render()
    {
        return view('livewire.tickets-user');
    }
}
