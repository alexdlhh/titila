<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patron extends Model
{
    protected $table = 'patron';

    protected $fillable = [
        'nombre',
        'ruta',
        'ruta_negativo',
        'creation_date',
        'update_date',
    ];

    protected $hidden = [];
}
