<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaResprecursosSoliInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resprecursos_soli_info', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('recursos_soli_info_id');
            $table->foreign('recursos_soli_info_id', 'fk_recursos_soli_info_respuesta')->references('id')->on('recursos_soli_info')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha', 100);
            $table->longText('respuesta');
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
        Schema::dropIfExists('resprecursos_soli_info');
    }
}
