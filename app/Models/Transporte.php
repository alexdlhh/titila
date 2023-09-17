<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $table = 'transporte';

    protected $fillable = [
        'nombre',
        'creation_date',
        'update_date',
        'descripcion',
        'portada',
        'id_ciudad',
        'web',
    ];

    protected $hidden = [];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }
}
