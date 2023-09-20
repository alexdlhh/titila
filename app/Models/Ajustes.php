<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    use HasFactory;

    protected $table = 'ajustes';

    protected $fillable = [
        'nombre',
        'valor'
    ];

    public function getUniqueNombreAttribute()
    {
        return $this->nombre;
    }
}
