<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDocrespuestaHechos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docrespuesta_hechos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('respuesta_hechos_id');
            $table->foreign('respuesta_hechos_id', 'fk_respuesta_hechos_doc')->references('id')->on('respuesta_hechos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('titulo', 255);
            $table->longText('descripcion')->nullable();
            $table->string('url', 255);
            $table->string('extension', 255);
            $table->double('peso');
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
        Schema::dropIfExists('docrespuesta_hechos');
    }
}
