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
            //------------------------------------------------- A Registrar -------------
            $table->string("antena_gps");
            $table->string("antena_gps_fab");
            $table->string("antena_gps_esp");
            //------------------------------
            $table->string("antena_parabolica");
            $table->string("antena_parabolica_fab");
            $table->string("antena_parabolica_esp");
            //------------------------------
            $table->string("bateria");
            $table->string("bateria_fab");
            $table->string("bateria_esp");
            //------------------------------
            $table->string("controlador_carga");
            $table->string("controlador_carga_fab");
            $table->string("controlador_carga_esp");
            //------------------------------
            $table->string("digitalizador");
            $table->string("digitalizador_fab");
            $table->string("digitalizador_esp");
            //------------------------------
            $table->string("modem_satelital");
            $table->string("modem_satelital_fab");
            $table->string("modem_satelital_esp");
            //------------------------------
            $table->string("panel_solar");
            $table->string("panel_solar_fab");
            $table->string("panel_solar_esp");
            //------------------------------
            $table->string("regulador_carga");
            $table->string("regulador_carga_fab");
            $table->string("regulador_carga_esp");
            //------------------------------
            $table->string("sismometro");
            $table->string("sismometro_fab");
            $table->string("sismometro_esp");
            //------------------------------
            $table->string("trompeta_satelital");
            $table->string("trompeta_satelital_fab");
            $table->string("trompeta_satelital_esp");
            //------------------------------
            $table->string("instalacion_satelital");
            //-----------------------------------------------------------------------
            
            $table->timestamps();
        });
        Schema::create('antenagps', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("antena_gps");
            $table->string("antena_gps_fab");
            $table->string("antena_gps_esp");
            //-----------------------------------------------------------------------------------

            $table->timestamps();
        });
        Schema::create('antenaparabolica', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("antena_parabolica");
            $table->string("antena_parabolica_fab");
            $table->string("antena_parabolica_esp");
            //-----------------------------------------------------------------------------------
            
            $table->timestamps();
        });
        Schema::create('bateria', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("bateria");
            $table->string("bateria_fab");
            $table->string("bateria_esp");
            //-----------------------------------------------------------------------------------

            $table->timestamps();
        });
        Schema::create('controladorcarga', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("controlador_carga");
            $table->string("controlador_carga_fab");
            $table->string("controlador_carga_esp");
            //-----------------------------------------------------------------------------------

            $table->timestamps();
        });
        Schema::create('digitalizador', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("digitalizador");
            $table->string("digitalizador_fab");
            $table->string("digitalizador_esp");
            //-----------------------------------------------------------------------------------

            $table->timestamps();
        });
        Schema::create('modemsatelital', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("modem_satelital");
            $table->string("modem_satelital_fab");
            $table->string("modem_satelital_esp");
            //-----------------------------------------------------------------------------------

            $table->timestamps();
        });
        Schema::create('panelsolar', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("panel_solar");
            $table->string("panel_solar_fab");
            $table->string("panel_solar_esp");
            //-----------------------------------------------------------------------------------

            $table->timestamps();
        });
        Schema::create('reguladorcarga', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("regulador_carga");
            $table->string("regulador_carga_fab");
            $table->string("regulador_carga_esp");
            //-----------------------------------------------------------------------------------

            $table->timestamps();
        });
        Schema::create('sismometro', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("sismometro");
            $table->string("sismometro_fab");
            $table->string("sismometro_esp");
            //-----------------------------------------------------------------------------------

            $table->timestamps();
        });
        Schema::create('trompetasatelital', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("trompeta_satelital");
            $table->string("trompeta_satelital_fab");
            $table->string("trompeta_satelital_esp");
            //-----------------------------------------------------------------------------------

            $table->timestamps();
        });
        Schema::create('instalacionsatelital', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            //------------------------------------------------- Datos a pertenecer --------------
            $table->string("estacion");
            $table->string("siglas");
            $table->string('autor');            

            //------------------------------------------------- Componente ----------------------
            $table->string("instalacion_satelital");
            //-----------------------------------------------------------------------------------

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
        Schema::dropIfExists('antenagps');
        Schema::dropIfExists('antenaparabolica');
        Schema::dropIfExists('bateria');
        Schema::dropIfExists('controladorcarga');
        Schema::dropIfExists('digitalizador');
        Schema::dropIfExists('modemsatelital');
        Schema::dropIfExists('panelsolar');
        Schema::dropIfExists('reguladorcarga');
        Schema::dropIfExists('sismometro');
        Schema::dropIfExists('trompetasatelital');
        Schema::dropIfExists('instalacionsatelital');
    }
};
