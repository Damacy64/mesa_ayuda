<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComputerUserFinal extends Model
{
    protected $table = 'computer_user_final';

    protected $fillable = [
        'user_final_id',
        'equipo_id',
        'fecha_asignacion',
        'fecha_liberacion',
    ];

    // Relación inversa a User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_final_id', 'id');
    }

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
