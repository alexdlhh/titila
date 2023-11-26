<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoviosPreferencias extends Model
{
    protected $table = 'novios_preferencias';

    protected $fillable = [
        'id_novio',
        'title_size',
        'text_size',
        'color_text',
        'message',
        'langs',
        'show_restaurants',
        'show_gifts',
        'show_city',
        'show_hotel'
    ];

    protected $hidden = [];

    public function novio()
    {
        return $this->belongsTo(Novio::class, 'id_novio');
    }
}
