<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAclaracionConAcla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aclaracion_con_acla', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('conceptouopinionconsultas_id');
            $table->foreign('conceptouopinionconsultas_id', 'fk_conceptouopinionconsultas_aclaracion')->references('id')->on('conceptouopinionconsultas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('aclaracion_con_acla');
    }
}
