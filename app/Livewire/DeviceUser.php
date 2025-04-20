<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DeviceUser extends Component
{
    public $datos;

    public function mount()
    {
        $this->datos = DB::table('computer_user_final as cuf')
            ->join('user_finals as uf', 'cuf.user_final_id', '=', 'uf.id')
            ->join('computers as c', 'cuf.equipo_id', '=', 'c.numero_serie')
            ->leftJoin('attributable as a_tipo', function ($join) {
                $join->on('a_tipo.attributable_id', '=', 'c.numero_serie')
                    ->where('a_tipo.atributo_tipo', '=', 'tipo_equipo');
            })
            ->leftJoin('attributable as a_marca', function ($join) {
                $join->on('a_marca.attributable_id', '=', 'c.numero_serie')
                    ->where('a_marca.atributo_tipo', '=', 'marca');
            })
            ->leftJoin('attributable as a_win', function ($join) {
                $join->on('a_win.attributable_id', '=', 'c.numero_serie')
                    ->where('a_win.atributo_tipo', '=', 'S.O.');
            })
            ->select(
                'uf.id as user_id',
                'c.numero_serie',
                'a_tipo.atributo_valor as tipo_equipo',
                'a_marca.atributo_valor as marca',
                'a_win.atributo_valor as version_windows'
            )
            ->get();
    }

    public function render()
    {
        return view('livewire.device-user');
    }
}
