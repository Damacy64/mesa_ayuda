<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'nombre';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = ['nombre'];

    public function userFinals()
    {
        return $this->hasMany(UserFinal::class, 'area_id', 'nombre');
    }

    public function departments()
    {
        return $this->hasmany(Department::class);
    }
}
