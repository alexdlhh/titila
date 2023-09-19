<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regalo extends Model
{
    protected $table = 'regalos';

    protected $fillable = [
        'nombre',
        'link',
        'mensaje',
        'portada',
        'estado',
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
