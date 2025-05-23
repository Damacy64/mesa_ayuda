<?php

namespace App\Livewire;

use Livewire\Component;

class ResetPassword extends Component
{

    public $email;
    public $token;

    public function mount(){
        // $this->token = request()->route('token');
        // $this->email = request()->query('email');
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
