<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibroDeFirma extends Model
{
    protected $table = 'libro_de_firmas';

    protected $fillable = [
        'nombre',
        'mensaje',
        'creation_date',
        'update_date',
        'id_novio',
        'id_invitado',
        'slug',
    ];

    protected $hidden = [];

    public function novio()
    {
        return $this->belongsTo(Novio::class, 'id_novio');
    }

    public function invitado()
    {
        return $this->belongsTo(Invitado::class, 'id_invitado');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
