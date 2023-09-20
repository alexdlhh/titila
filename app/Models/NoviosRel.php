<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NovioRel extends Model
{
    protected $table = 'novios_rel';

    protected $fillable = [
        'id_novio',
        'id_ciudad',
        'restaurantes',
        'actividades',
        'imperdibles',
        'estetica',
        'alojamiento',
        'transporte',
        'id_media_svg'
    ];

    protected $hidden = [];

    public function novio()
    {
        return $this->belongsTo(Novio::class, 'id_novio');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }

    public function mediaSvg()
    {
        return $this->belongsTo(MediaSvg::class, 'id_media_svg');
    }

    public function restaurantes()
    {
        return $this->hasOne(Restaurante::class, 'id', 'restaurantes');
    }

    public function actividades()
    {
        return $this->hasOne(Actividad::class, 'id', 'actividades');
    }

    public function imperdibles()
    {
        return $this->hasOne(Imperdible::class, 'id', 'imperdibles');
    }

    public function estetica()
    {
        return $this->hasOne(Estetica::class, 'id', 'estetica');
    }

    public function alojamiento()
    {
        return $this->hasOne(Alojamiento::class, 'id', 'alojamiento');
    }

    public function transporte()
    {
        return $this->hasOne(Transporte::class, 'id', 'transporte');
    }
}
