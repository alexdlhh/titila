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
        'portada',
        'creation_date',
        'update_date',
    ];

    protected $hidden = [];

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' (' . $this->alias . ')';
    }
}