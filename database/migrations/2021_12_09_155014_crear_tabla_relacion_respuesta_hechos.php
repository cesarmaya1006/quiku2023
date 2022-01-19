<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRelacionRespuestaHechos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_respuesta_hechos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('auto_admisorio_id');
            $table->foreign('auto_admisorio_id', 'fk_auto_admisorio_rrh')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('hecho_tutela_id')->nullable();
            $table->foreign('hecho_tutela_id', 'fk_hechos_tutela_rrh')->references('id')->on('hechos_tutela')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('respuesta_hechos_id')->nullable();
            $table->foreign('respuesta_hechos_id', 'fk_respuesta_hechos_rrh')->references('id')->on('respuesta_hechos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('relacion_respuesta_hechos');
    }
}
