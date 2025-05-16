<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ticketHistory extends Model
{
    protected $table = 'ticket_history';
    protected $fillable = [
        'ticket_id',
        'campo_modificado',
        'valor_anterior',
        'valor_nuevo',
        'fecha_cambio'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
