<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'departamento';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = ['departamento'];

    public function userFinals()
    {
        return $this->hasMany(UserFinal::class, 'area_id', 'departamento');
    }
}
