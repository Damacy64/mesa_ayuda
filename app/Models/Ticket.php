<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $primaryKey = 'folio';
    public $incrementing = true;

    protected $fillable = [
        'created_at',
        'prioridad_id',
        'estatus_id',
        'equipo_numero_serie',
        'titulo',
        'descripcion',
        'solucion',
        'fecha_termino',
        'tiempo_solucion',
        'usuario_id',
        'tecnico_id',
    ];

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'prioridad_id', 'nombre');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'estatus_id', 'nombre');
    }

    public function equipo()
    {
        return $this->belongsTo(Computer::class, 'equipo_numero_serie', 'numero_serie');
    }

    public function usuario()
    {
        return $this->belongsTo(UserFinal::class, 'usuario_id');
    }

    public function tecnico()
    {
        return $this->belongsTo(Support::class, 'tecnico_id');
    }

    public function opciones()
    {
        return $this->belongsToMany(
            Option::class,
            'ticket_opcion',
            'ticket_id',
            'opcion_id'
        )->withTimestamps();
    }

    public function historial()
    {
        return $this->hasMany(TicketHistory::class, 'ticket_id');
    }

    public function getTipoTicketAttribute()
    {
        return optional(
            $this->opciones->firstWhere('nivel', 'categoria')
        )->valor;
    }

    public function getTipoFallaAttribute()
    {
        return optional(
            $this->opciones->firstWhere('nivel', 'falla')
        )->valor;
    }
}
