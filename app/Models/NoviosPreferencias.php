<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NovioPreferencia extends Model
{
    protected $table = 'novios_preferencias';

    protected $fillable = [
        'novio',
        'novia',
        'fecha_boda',
        'fuente',
        'color',
        'font_size',
        'mensaje',
        'id_media_svg',
        'title_size',
        'color_fondo',
        'color_texto',
        'patron',
        'id_novio',
    ];

    protected $hidden = [];

    public function mediaSvg()
    {
        return $this->belongsTo(MediaSvg::class, 'id_media_svg');
    }

    public function novio()
    {
        return $this->belongsTo(Novio::class, 'id_novio');
    }
}
