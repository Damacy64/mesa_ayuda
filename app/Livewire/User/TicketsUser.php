<?php

namespace App\Livewire\User;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Component;

class TicketsUser extends Component
{

    use WithPagination;

    #[On('ticketCreated')]

    public function render()
    {
        return view('livewire.user.tickets-user', [
            'tickets' => Ticket::where('usuario_id', Auth::user()->userFinal->id)->orderBy('folio', 'desc')->paginate(15),
        ]);
    }
 
    public function reabrirTicket($folio)
    {
        $this->dispatch('reabrir-modal', $folio);
    }
}
