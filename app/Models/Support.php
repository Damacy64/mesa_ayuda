<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'support';

    protected $fillable = [
        'hora_entrada',
        'hora_salida',
        'estado',
        'empleado_id',
        'hora_entrada',
        'hora_salida',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'tecnico_id');
    }
}
