<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'precio',
        'kilometraje',
        'color',
        'email',
        'telefono',
        'fotografia',
        'ruta'

    ];
}
