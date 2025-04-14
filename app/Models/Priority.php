<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priority';
    protected $primaryKey = 'nombre';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = ['nombre'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'prioridad_id', 'nombre');
    }
}
