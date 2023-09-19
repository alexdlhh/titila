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
        'valor',
        'creation_date',
        'update_date',
    ];

    public function getUniqueNombreAttribute()
    {
        return $this->nombre;
    }
}
