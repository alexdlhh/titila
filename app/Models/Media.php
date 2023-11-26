<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'nombre',
        'ruta',
        'tipo',
        'id_novio'
    ];

    protected $hidden = [];

    public function novio()
    {
        return $this->belongsTo(novio::class, 'id_novio');
    }
}
