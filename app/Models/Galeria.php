<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galeria';

    protected $fillable = [
        'creation_date',
        'update_date',
        'ruta',
        'id_novio',
    ];

    protected $hidden = [];

    public function novio()
    {
        return $this->belongsTo(Novio::class, 'id_novio');
    }
}
