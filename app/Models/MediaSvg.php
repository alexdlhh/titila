<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaSvg extends Model
{
    protected $table = 'media_svg';

    protected $fillable = [
        'nombre',
        'codigo',
        'tipo',
        'creation_date',
        'update_date',
        'id_ciudad',
    ];

    protected $hidden = [];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }
}
