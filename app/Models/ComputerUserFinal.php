<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComputerUserFinal extends Model
{
    protected $table = 'equipo_user_final';

    protected $fillable = [
        'user_final_id',
        'equipo_id',
        'fecha_asignacion',
        'fecha_liberacion',
    ];

    // Si no quieres timestamps automáticos en pivot, descomenta:
    // public $timestamps = false;

    // Relación inversa a UserFinal
    public function userFinal()
    {
        return $this->belongsTo(UserFinal::class, 'user_final_id');
    }

    // Relación inversa a Equipo
    public function equipo()
    {
        return $this->belongsTo(Computer::class, 'equipo_id', 'numero_serie');
    }
}
