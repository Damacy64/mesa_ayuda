<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class TicketsTable extends Component
{

    public $tickets;

    public function mount(){
        $this->tickets = Ticket::latest()->get();
    }

    public function render()
    {
        return view('livewire.tickets-table');
    }
}
