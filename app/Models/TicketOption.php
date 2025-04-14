<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketOption extends Model
{
    protected $table = 'ticket_opcion';
    public $timestamps = true;

    protected $fillable = ['ticket_id', 'opcion_id'];
}
