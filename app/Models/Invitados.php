<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitados extends Model
{
    protected $table = 'invitados';

    protected $fillable = [
        'nombre',
        'invitados',
        'confirmacion',
        'menus',
        'alergenos',
        'email',
        'telefono',
        'id_novio'
    ];

    protected $hidden = [];

    public function novio()
    {
        return $this->belongsTo(Novio::class, 'id_novio');
    }
}
