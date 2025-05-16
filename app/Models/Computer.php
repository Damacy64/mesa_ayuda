<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $primaryKey = 'numero_serie';
    public $incrementing = false;

    protected $fillable = [
        'numero_inventario',
        'numero_serie',
        'modelo',
        'direccion_ip',
        'internet',
        'serie_monitor',
        'serie_teclado',
        'serie_mouse',
        'version_procesador',
        'flash',
        'estado',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'equipo_numero_serie', 'numero_serie');
    }

    public function atributos()
    {
        return $this->morphToMany(
            Attribute::class,
            'attributable',
            'attributable',
            'attributable_id',
            'atributo_valor',
            'numero_serie',
            'valor'
        )->withPivot('atributo_tipo', 'atributo_valor');
    }

    public function usuarios()
    {
        return $this->belongsToMany(UserFinal::class, 'computer_user_final', 'equipo_numero_serie', 'user_final_id')
            ->using(ComputerUserFinal::class)
            ->withPivot(['fecha_asignacion', 'fecha_liberacion'])
            ->withTimestamps();
    }

    public function getMarcaAttribute()
    {
        return $this->atributos()->where('atributo_tipo', 'Marca')->first()?->valor ?? 'N/A';
    }

    public function getTipoDispositivoAttribute()
    {
        return $this->atributos()->where('atributo_tipo', 'Tipo de equipo')->first()?->valor ?? 'N/A';
    }
}
