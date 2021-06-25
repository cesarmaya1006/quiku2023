<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAclaracionRepIrre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aclaracion_rep_irre', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('denunciairregularidades_id');
            $table->foreign('denunciairregularidades_id', 'fk_denunciairregularidades_aclaracion')->references('id')->on('denunciairregularidades')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('aclaracion_rep_irre');
    }
}
