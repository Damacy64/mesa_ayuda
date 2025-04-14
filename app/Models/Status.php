<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'nombre';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = ['nombre'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'estatus_id', 'nombre');
    }
}
