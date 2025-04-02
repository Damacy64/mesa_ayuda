<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserFinal extends Model
{
    protected $fillable = [
        'empleados_id',
        'ubicacion_id',
        'area_id',
    ];

    public function empleado():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
