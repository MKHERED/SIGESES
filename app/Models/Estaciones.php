<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'siglas',
        'ubicacion',
        'seg_satelital',
        'estado',
        'municipio',
        'frecuencia',
        'nivel',
        'autor',
        'custodio',
        'tlf_custodio',
        'dependencia',	
        'created_at',
        'asig_frecuencia',
        'carina',
        'longitud',
        'latitud',
        'elevacion',
        'azimut',	
        'operativa',
    ];
}
