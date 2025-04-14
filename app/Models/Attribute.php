<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['tipo', 'valor'];

    public function equipos()
    {
        return $this->morphedByMany(
            Computer::class,
            'attributable',
            'attributable',
            'atributo_id',
            'attributable_id'
        );
    }
}
