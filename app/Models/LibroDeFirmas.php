<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibroDeFirmas extends Model
{
    protected $table = 'libro_de_firmas';

    protected $fillable = [
        'nombre',
        'mensaje',
        'hash',
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
        return 'hash';
    }
}
