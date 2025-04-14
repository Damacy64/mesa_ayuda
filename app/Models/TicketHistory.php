<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketHistory extends Model
{
    protected $table = 'history_ticket';

    protected $fillable = [
        'ticket_id',
        'estado_anterior',
        'estado_nuevo',
        'comentario',
        'usuario_responsable_id',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function responsable()
    {
        return $this->belongsTo(UserFinal::class, 'usuario_responsable_id');
    }
}
