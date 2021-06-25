<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAclaracionSoliDatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aclaracion_soli_datos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('solicituddatossolicitudes_id');
            $table->foreign('solicituddatossolicitudes_id', 'fk_solicituddatossolicitudes_aclaracion')->references('id')->on('solicituddatossolicitudes')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha');
            $table->longText('tipo_solicitud');
            $table->longText('aclaracion');
            $table->longText('respuesta')->nullable();
            $table->date('fecha_respuesta')->nullable();
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
        Schema::dropIfExists('aclaracion_soli_datos');
    }
}
