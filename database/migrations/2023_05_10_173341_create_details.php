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
        Schema::create('details', function (Blueprint $table) {
            $table->id()->autoIncrement();
            //------------------------------------------------- Originales --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string("autor");
            //------------------------------------------------- A Registrar -------------
            $table->string('transceptor_marca')->nullable(true);
            $table->string('transceptor_modelo')->nullable(true);
            $table->string('transceptor_serial')->nullable(true);
            $table->date('transceptor_fecha')->nullable(true);

            $table->string('digitalizador_marca')->nullable(true);
            $table->string('digitalizador_modelo')->nullable(true);
            $table->string('digitalizador_serial')->nullable(true);
            $table->date('digitalizador_fecha')->nullable(true);
            
            $table->string('sensor_marca')->nullable(true);
            $table->string('sensor_modelo')->nullable(true);
            $table->string('sensor_serial')->nullable(true);
            $table->string('sensor_sen')->nullable(true);
            $table->date('sensor_fecha')->nullable(true);
            
            $table->string('BUC_marca')->nullable(true);
            $table->string('BUC_modelo')->nullable(true);
            $table->string('BUC_frecuencia')->nullable(true);
            $table->string('BUC_serial')->nullable(true);
            $table->date('BUC_fecha')->nullable(true);
            
            $table->string('LNB_marca')->nullable(true);
            $table->string('LNB_modelo')->nullable(true);
            $table->string('LNB_frecuencia')->nullable(true);
            $table->string('LNB_banda')->nullable(true);
            $table->string('LNB_serial')->nullable(true);
            $table->date('LNB_fecha')->nullable(true);
            
            $table->string('gps_marca')->nullable(true);
            $table->string('gps_modelo')->nullable(true);
            $table->string('gps_serial')->nullable(true);
            $table->date('gps_fecha')->nullable(true);

            $table->string('parabolica_marca')->nullable(true);
            $table->string('parabolica_serial')->nullable(true);
            $table->string('parabolica_diametro')->nullable(true);
            $table->date('parabolica_fecha')->nullable(true);

            $table->string('trompeta_marca')->nullable(true);
            $table->string('trompeta_serial')->nullable(true);
            $table->date('trompeta_fecha')->nullable(true);

            $table->string('regulador_voltaje_marca')->nullable(true);
            $table->string('regulador_voltaje_modelo')->nullable(true);
            $table->string('regulador_voltaje_serial')->nullable(true);
            $table->string('regulador_voltaje_watts')->nullable(true);
            $table->date('regulador_voltaje_fecha')->nullable(true);

            $table->string('banco_baterias_marca')->nullable(true);
            $table->string('banco_baterias_modelo')->nullable(true);
            $table->string('banco_baterias_serial')->nullable(true);
            $table->string('banco_baterias_watts')->nullable(true);
            $table->string('banco_baterias_cantidad')->nullable(true);
            $table->date('banco_baterias_fecha')->nullable(true);

            $table->string('panel_solar_a_marca')->nullable(true);
            $table->string('panel_solar_a_modelo')->nullable(true);
            $table->string('panel_solar_a_serial')->nullable(true);
            $table->string('panel_solar_a_watts')->nullable(true);
            $table->date('panel_solar_a_fecha')->nullable(true);

            $table->string('panel_solar_b_marca')->nullable(true);
            $table->string('panel_solar_b_modelo')->nullable(true);
            $table->string('panel_solar_b_serial')->nullable(true);
            $table->string('panel_solar_b_watts')->nullable(true);
            $table->date('panel_solar_b_fecha')->nullable(true);

            $table->string('panel_solar_c_marca')->nullable(true);
            $table->string('panel_solar_c_modelo')->nullable(true);
            $table->string('panel_solar_c_serial')->nullable(true);
            $table->string('panel_solar_c_watts')->nullable(true);
            $table->date('panel_solar_c_fecha')->nullable(true);

            $table->string('panel_solar_d_marca')->nullable(true);
            $table->string('panel_solar_d_modelo')->nullable(true);
            $table->string('panel_solar_d_serial')->nullable(true);
            $table->string('panel_solar_d_watts')->nullable(true);
            $table->date('panel_solar_d_fecha')->nullable(true);

            $table->string('panel_solar_e_marca')->nullable(true);
            $table->string('panel_solar_e_modelo')->nullable(true);
            $table->string('panel_solar_e_serial')->nullable(true);
            $table->string('panel_solar_e_watts')->nullable(true);
            $table->date('panel_solar_e_fecha')->nullable(true);
            //-----------------------------------------------------------------------
            $table->string('trabajo')->nullable(true);
            
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
        Schema::dropIfExists('details');
    }
};
