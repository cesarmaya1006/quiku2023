<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDespachos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despachos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('jurisdiccion', 255)->nullable();
            $table->string('distrito', 255)->nullable();
            $table->string('circuito', 255)->nullable();
            $table->string('departamento', 255)->nullable();
            $table->string('municipio', 255)->nullable();
            $table->string('codigo_despacho', 255)->nullable();
            $table->string('nombre_despacho', 255)->nullable();
            $table->string('nombre_juez', 255)->nullable();
            $table->string('direccion_despacho', 250)->nullable();
            $table->string('telefono_despacho', 20)->nullable();
            $table->string('correo_despacho', 100)->nullable();
            $table->string('area', 255)->nullable();
            $table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despachos');
    }
}
