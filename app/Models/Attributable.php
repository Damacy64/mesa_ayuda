<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Attributable extends Model
{
    protected $table = 'attributable';
    public $timestamps = false;

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'atributo_tipo',
        'atributo_valor',
        'attributable_id',
        'attributable_type',
    ];

    /**
     * Relación con el modelo Attribute.
     */
    public function atributo()
    {
        return $this->belongsTo(Attribute::class, [
            'atributo_tipo', 'atributo_valor'
        ], [
            'tipo', 'valor'
        ]);
    }

    /**
     * Relación polimórfica.
     */
    public function attributable(): MorphTo
    {
        return $this->morphTo();
    }
}
