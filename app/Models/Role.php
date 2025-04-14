<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'rol';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = ['rol'];

    public function users()
    {
        return $this->hasMany(User::class, 'rol_id', 'rol');
    }
}
