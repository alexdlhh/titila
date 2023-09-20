<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alojamiento extends Model
{
    protected $table = 'alojamiento';

    protected $fillable = [
        'nombre',
        'descripcion',
        'portada',
        'id_ciudad'
    ];

    protected $hidden = [];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }
}
