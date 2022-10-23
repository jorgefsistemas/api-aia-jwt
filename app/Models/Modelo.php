<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre'
    ];

    // protected $with = ['marca'];


    // public function marca()
    // {
    //     return $this->hasOne(Marcas::class);
    // }

}
