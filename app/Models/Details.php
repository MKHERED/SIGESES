<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'estacion',
        'siglas',
        'autor',

        'transceptor_marca',
        'transceptor_modelo',
        'transceptor_serial',
        'transceptor_fecha',

        'digitalizador_marca',
        'digitalizador_modelo',
        'digitalizador_serial',
        'digitalizador_fecha',
            
        'sensor_marca',
        'sensor_modelo',
        'sensor_serial',
        'sensor_fecha',
            
        'BUC_marca',
        'BUC_modelo',
        'BUC_frecuencia',
        'BUC_serial',
        'BUC_fecha',
            
        'LNB_marca',
        'LNB_modelo',
        'LNB_frecuencia',
        'LNB_banda',
        'LNB_serial',
        'LNB_fecha',

        'antena_gps_marca',
        'antena_gps_modelo',
        'antena_gps_serial',
        'antena_gps_fecha',

        'parabolica_marca',
        'parabolica_serial',
        'parabolica_diametro',
        'parabolica_fecha',

        'trompeta_marca',
        'trompeta_serial',
        'trompeta_fecha',

        'regulador_voltaje_marca',
        'regulador_voltaje_modelo',
        'regulador_voltaje_serial',
        'regulador_voltaje_watts',
        'regulador_voltaje_fecha',

        'banco_baterias_marca',
        'banco_baterias_modelo',
        'banco_baterias_serial',
        'banco_baterias_watts',
        'banco_baterias_cantidad',
        'banco_baterias_fecha',

        'panel_solar_a_marca',
        'panel_solar_a_modelo',
        'panel_solar_a_serial',
        'panel_solar_a_watts',
        'panel_solar_a_fecha',

        'panel_solar_b_marca',
        'panel_solar_b_modelo',
        'panel_solar_b_serial',
        'panel_solar_b_watts',
        'panel_solar_b_fecha',

        'panel_solar_c_marca',
        'panel_solar_c_modelo',
        'panel_solar_c_serial',
        'panel_solar_c_watts',
        'panel_solar_c_fecha',

        'panel_solar_d_marca',
        'panel_solar_d_modelo',
        'panel_solar_d_serial',
        'panel_solar_d_watts',
        'panel_solar_d_fecha',

        'panel_solar_e_marca',
        'panel_solar_e_modelo',
        'panel_solar_e_serial',
        'panel_solar_e_watts',
        'panel_solar_e_fecha',
    ];
}
