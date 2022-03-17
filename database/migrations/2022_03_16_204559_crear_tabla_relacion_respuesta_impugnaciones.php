<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRelacionRespuestaImpugnaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_respuesta_impugnaciones', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('sentenciapinstancia_id');
            $table->foreign('sentenciapinstancia_id', 'fk_sentenciapinstancia_rri')->references('id')->on('sentenciapinstancia')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('impugnacion_interna_id')->nullable();
            $table->foreign('impugnacion_interna_id', 'fk_impugnacion_interna_rri')->references('id')->on('impugnacion_interna')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('respuesta_impugnaciones_id')->nullable();
            $table->foreign('respuesta_impugnaciones_id', 'fk_respuesta_impugnaciones_rri')->references('id')->on('respuesta_impugnaciones')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('relacion_respuesta_impugnaciones');
    }
}
