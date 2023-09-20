<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imperdible extends Model
{
    protected $table = 'imperdibles';

    protected $fillable = [
        'nombre',
        'descripcion',
        'web',
        'portada',
        'id_ciudad',
    ];

    protected $hidden = [];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }
}
