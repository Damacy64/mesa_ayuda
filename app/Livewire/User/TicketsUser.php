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

    public $sortField = '';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }   
        $this->sortField = $field;
    }

    #[On('ticketCreated')]

    public function render()
    {
        return view('livewire.user.tickets-user', [
                'tickets' => Ticket::where('usuario_id', Auth::user()->userFinal->id)->orderBy($this->sortField ?: 'folio', $this->sortDirection)->paginate(15),
        ]);
    }
 
    public function reabrirTicket($folio)
    {
        $this->dispatch('reabrir-modal', $folio);
    }
}
