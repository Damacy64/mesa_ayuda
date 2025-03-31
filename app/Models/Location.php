<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'piso',
    ];

    public function obtenerDatos(){
        $datos = Location::all();
        return view('auth.register',compact('datos'));
    }
}
