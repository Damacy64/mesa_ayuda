<?php

namespace App\Livewire;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
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
            'tickets' => Ticket::where('usuario_id', Auth::user()->id)->orderBy('folio', 'desc')->paginate(15),
        ]);
        
    }
}
