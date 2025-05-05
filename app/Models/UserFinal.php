<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserFinal extends Model
{
    protected $table = 'user_finals';

    protected $fillable = [
        'ubicacion_id',
        'area_id',
        'empleado_id',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'ubicacion_id', 'piso');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'nombre');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'usuario_id');
    }

    public function ticketHistorials()
    {
        return $this->hasMany(TicketHistory::class, 'usuario_responsable_id');
    }

    public function equipos()
    {
        return $this->belongsToMany(
            Computer::class,
            'computer_user_final',
            'user_final_id',
            'equipo_id'
        )
            ->using(ComputerUserFinal::class)
            ->withPivot(['fecha_asignacion', 'fecha_liberacion'])
            ->withTimestamps();
    }
}
