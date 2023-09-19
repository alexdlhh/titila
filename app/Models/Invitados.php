<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
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
        'id_novio',
        'creation_date',
        'update_date',
    ];

    protected $hidden = [];

    public function novio()
    {
        return $this->belongsTo(Novio::class, 'id_novio');
    }
}
