<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRelacionRespuestaPretensiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_respuesta_pretensiones', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('auto_admisorio_id');
            $table->foreign('auto_admisorio_id', 'fk_auto_admisorio_rrp')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('pretension_tutela_id')->nullable();
            $table->foreign('pretension_tutela_id', 'fk_hechos_tutela_rrp')->references('id')->on('pretensiones_tutela')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('respuesta_pretensiones_id')->nullable();
            $table->foreign('respuesta_pretensiones_id', 'fk_respuesta_pretensiones_rrp')->references('id')->on('respuesta_pretensiones')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('relacion_respuesta_pretensiones');
    }
}
