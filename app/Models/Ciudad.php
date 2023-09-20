<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';

    protected $fillable = [
        'nombre',
        'alias',
        'descripcion',
        'portada'
    ];

    protected $hidden = [];

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' (' . $this->alias . ')';
    }
}