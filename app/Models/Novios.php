<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Novio extends Model
{
    protected $table = 'novios';

    protected $fillable = [
        'novio',
        'novia',
        'fecha_boda',
        'habilitar',
        'publicar',
        'estado',
        'creation_date',
        'update_date',
        'programa',
    ];

    protected $hidden = [];
}
