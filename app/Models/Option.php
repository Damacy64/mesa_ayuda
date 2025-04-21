<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';

    protected $fillable = ['nivel', 'valor', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Option::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Option::class, 'parent_id');
    }

    public function tickets()
    {
        return $this->belongsToMany(
            Ticket::class,
            'ticket_opcion',
            'opcion_id',
            'ticket_id'
        )->withTimestamps();
    }
}
