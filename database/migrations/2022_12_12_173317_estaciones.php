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
        Schema::create('estaciones', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('siglas');
            $table->string('nombre');

            $table->string('seg_satelital');
            $table->string('asig_frecuencia');
            $table->string('carina');

            $table->string('autor');

            $table->string('custodio');
            $table->string('tlf_custodio');
            $table->string('dependencia');

            $table->string('frecuencia');
            $table->string('nivel');

            $table->string('ubicacion');
            $table->string('estado');
            $table->string('municipio');                      

            $table->string('longitud');
            $table->string('latitud');
            $table->string('elevacion');
            $table->string('azimut');


            $table->string('operativa');
            $table->string('imagen_n');
            $table->string('img_dir');
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
        Schema::dropIfExists('estaciones');
    }
};
