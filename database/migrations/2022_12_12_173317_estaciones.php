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
            $table->string('ubicacion');
            $table->string('longitud');
            $table->string('latitud');
            $table->string('altitud');
            $table->string('region');
            $table->string('estado');
            $table->boolean('operativa')->default(0); // 0=desactivado 1=activado
            $table->timestamp('created_at');
            $table->string('imagen');
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
