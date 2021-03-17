<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaParametros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('logo', 50)->nullable();
            $table->string('bg_titulo', 30);
            $table->string('color_titulo', 30);
            $table->string('titulo', 255);
            $table->string('bg_caja', 30);
            $table->string('bg_botones', 30);
            $table->string('color_botones', 30);
            $table->string('color_titulos', 30);
            $table->string('color_texto', 30);
            $table->string('fondo1', 30);
            $table->string('fondo2', 30);
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
        Schema::dropIfExists('parametros');
    }
}
