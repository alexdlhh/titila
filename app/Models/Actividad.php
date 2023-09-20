<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = [
        'nombre',
        'descripcion',
        'portada',
        'id_ciudad',
    ];

    protected $hidden = [];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }
}