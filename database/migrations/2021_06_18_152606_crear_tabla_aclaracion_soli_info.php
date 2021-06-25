<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAclaracionSoliInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aclaracion_soli_info', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('solicituddocinfopeticiones_id');
            $table->foreign('solicituddocinfopeticiones_id', 'fk_solicituddocinfopeticiones_aclaracion')->references('id')->on('solicituddocinfopeticiones')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('aclaracion_soli_info');
    }
}
