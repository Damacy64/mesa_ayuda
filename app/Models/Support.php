<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'support';

    protected $fillable = [
        'carga_trabajo',
        'disponibilidad',
        'estado',
        'empleado_id',
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
