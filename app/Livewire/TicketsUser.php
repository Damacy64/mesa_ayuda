<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ticket;
use Livewire\Attributes\On;

class TicketsUser extends Component
{


    #[On('ticketCreated')] 
    
    public function render()
    {
        return view('livewire.tickets-user', [
        ]);
    }
}
