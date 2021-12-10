<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRespuestaHechos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_hechos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('hechos_tutela_id');
            $table->foreign('hechos_tutela_id', 'fk_hechos_tutela_respuesta')->references('id')->on('hechos_tutela')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha');
            $table->longText('respuesta')->nullable();
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
        Schema::dropIfExists('respuesta_hechos');
    }
}
