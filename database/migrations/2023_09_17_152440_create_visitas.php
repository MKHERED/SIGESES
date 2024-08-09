<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Originales --------------
            $table->string("estacion", 20);
            $table->string("siglas", 20);
            $table->string("autor", 20);

            $table->string("operadores", 250);
            $table->string("custodio", 100);
            $table->string("tlf_custodio", 100);
            $table->longText("trabajo", 400);
            $table->string("direccion", 250);
            
            $table->string('frecuencia', 100);
            $table->string('nivel', 100);

            $table->string('seg_satelital', 100);
            $table->string('asig_frecuencia', 100);
            $table->string('carina', 100);
            
            $table->string('ubicacion', 250);
            $table->string('estado', 250);
            $table->string('municipio', 100);

            $table->string('longitud', 50);
            $table->string('latitud', 50);
            $table->string('elevacion', 50);
            $table->string('azimut', 50);

            $table->string('transceptor_marca', 100)->nullable(true);
            $table->string('transceptor_modelo', 100)->nullable(true);
            $table->string('transceptor_serial', 100)->nullable(true);
            $table->date('transceptor_fecha', 100)->nullable(true);

            $table->string('digitalizador_marca', 100)->nullable(true);
            $table->string('digitalizador_modelo', 100)->nullable(true);
            $table->string('digitalizador_serial', 100)->nullable(true);
            $table->date('digitalizador_fecha', 100)->nullable(true);
            
            $table->string('sensor_marca', 100)->nullable(true);
            $table->string('sensor_modelo', 100)->nullable(true);
            $table->string('sensor_serial', 100)->nullable(true);
            $table->string('sensor_sen', 100)->nullable(true);
            $table->date('sensor_fecha')->nullable(true);
            
            $table->string('BUC_marca', 100)->nullable(true);
            $table->string('BUC_modelo', 100)->nullable(true);
            $table->string('BUC_serial', 100)->nullable(true);
            $table->date('BUC_fecha')->nullable(true);
            
            $table->string('LNB_marca', 100)->nullable(true);
            $table->string('LNB_modelo', 100)->nullable(true);
            $table->string('LNB_serial', 100)->nullable(true);
            $table->date('LNB_fecha')->nullable(true);

            $table->string('antena_gps_marca', 100)->nullable(true);
            $table->string('antena_gps_modelo', 100)->nullable(true);
            $table->string('antena_gps_serial', 100)->nullable(true);
            $table->date('antena_gps_fecha')->nullable(true);

            $table->string('regulador_voltaje_marca', 100)->nullable(true);
            $table->string('regulador_voltaje_modelo', 100)->nullable(true);
            $table->string('regulador_voltaje_serial', 100)->nullable(true);
            $table->string('regulador_voltaje_watts', 100)->nullable(true);
            $table->date('regulador_voltaje_fecha')->nullable(true);

            $table->string('banco_baterias_marca', 100)->nullable(true);
            $table->string('banco_baterias_modelo', 100)->nullable(true);
            $table->string('banco_baterias_serial', 100)->nullable(true);
            $table->string('banco_baterias_watts', 100)->nullable(true);
            $table->string('banco_baterias_cantidad', 100)->nullable(true);
            $table->date('banco_baterias_fecha')->nullable(true);

            $table->string('panel_solar_a_marca', 100)->nullable(true);
            $table->string('panel_solar_a_modelo', 100)->nullable(true);
            $table->string('panel_solar_a_serial', 100)->nullable(true);
            $table->string('panel_solar_a_watts', 100)->nullable(true);
            $table->date('panel_solar_a_fecha')->nullable(true);

            $table->string('panel_solar_b_marca', 100)->nullable(true);
            $table->string('panel_solar_b_modelo', 100)->nullable(true);
            $table->string('panel_solar_b_serial', 100)->nullable(true);
            $table->string('panel_solar_b_watts', 100)->nullable(true);
            $table->date('panel_solar_b_fecha')->nullable(true);

            $table->string('panel_solar_c_marca', 100)->nullable(true);
            $table->string('panel_solar_c_modelo', 100)->nullable(true);
            $table->string('panel_solar_c_serial', 100)->nullable(true);
            $table->string('panel_solar_c_watts', 100)->nullable(true);
            $table->date('panel_solar_c_fecha')->nullable(true);

            $table->string('panel_solar_d_marca', 100)->nullable(true);
            $table->string('panel_solar_d_modelo', 100)->nullable(true);
            $table->string('panel_solar_d_serial', 100)->nullable(true);
            $table->string('panel_solar_d_watts', 100)->nullable(true);
            $table->date('panel_solar_d_fecha')->nullable(true);

            $table->string('panel_solar_e_marca', 100)->nullable(true);
            $table->string('panel_solar_e_modelo', 100)->nullable(true);
            $table->string('panel_solar_e_serial', 100)->nullable(true);
            $table->string('panel_solar_e_watts', 100)->nullable(true);
            $table->date('panel_solar_e_fecha')->nullable(true);
            
            //------------------------------------------------- A Registrar -------------
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitas');
    }
};
