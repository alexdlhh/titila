<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Novios extends Model
{
    protected $table = 'novios';

    protected $fillable = [
        'novio',
        'novia',
        'fecha_boda',
        'habilitar',
        'publicar',
        'estado',
        'programa',
    ];

    protected $hidden = [];
}
