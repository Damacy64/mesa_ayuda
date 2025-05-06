<?php

namespace App\Livewire\Admin;

use App\Models\Gender;
use App\Models\Support;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Component;

class AgregarTecnicoModal extends Component
{
    public $open = false;
    public $generos = [];

    public $name;
    public $last_name_p;
    public $last_name_m;
    public $sex;
    public $employer_number;
    public $email;
    public $email_confirmation;
    public $password;

    protected $rules = [
        'name' => ['required'],
        'last_name_p' => ['required'],
        'sex' => ['required'],
        'employer_number' => ['required', 'min:7', 'max:7'],
        'email' => ['required', 'email'],
        'email_confirmation' => ['required', 'same:email'],
        'password' => ['required', 'min:8', 'max:15'],
    ];

    #[On('agregarTecnicoModal')]
    public function abrir()
    {
        $this->open = true;
    }

    public function close()
    {
        $this->reset([
            'name',
            'last_name_p',
            'last_name_m',
            'sex',
            'employer_number',
            'email',
            'email_confirmation',
            'password',
        ]);
        $this->resetValidation();
        $this->open = false;
    }

    public function agregarTecnico()
    {
        $this->validate();

        $tecnico = User::create([
            'name' => Str::upper($this->name),
            'last_name_p' => Str::upper($this->last_name_p),
            'last_name_m' => Str::upper($this->last_name_m),
            'sex_id' => $this->sex,
            'rol_id' => 'SOPORTE',
            'employer_number' => $this->employer_number,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Support::create([
            'empleado_id' => $tecnico->id,
            'carga_trabajo' => 0,
            'disponibilidad' => 'DESOCUPADO',
            'estado' => 'HABILITADO',
        ]);

        //$this->emit('refreshTecnicos');
        $this->close();
    }

    public function mount(){
        $this->generos = Gender::all();
    }

    public function render()
    {
        return view('livewire.admin.agregar-tecnico-modal');
    }
}
