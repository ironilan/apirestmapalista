<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{
    protected $fillable = [
        'longitud',
        'latitud',
        'estado'
    ];
}
