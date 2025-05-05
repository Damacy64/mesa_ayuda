<?php

namespace App\Livewire\Admin;

use App\Models\UserFinal;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        $usuarios = UserFinal::with(['user', 'location', 'area'])->get();
        return view('livewire.admin.users', compact('usuarios'));
    }
}
