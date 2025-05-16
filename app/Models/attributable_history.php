<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attributable_history extends Model
{
    protected $table = 'attributable_history';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'atributo_tipo',
        'atributo_valor_anterior',
        'atributo_valor_nuevo',
        'attributable_id',
        'attributable_type',
        'fecha_cambio',
    ];
}
