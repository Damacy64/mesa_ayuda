<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{

    protected $fillable = [
        'nombre',
        'area_id',
    ];

    public function area() : BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
