<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaApoderadosProceso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoderados_proceso', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('procesos_id');
            $table->foreign('procesos_id', 'fk_proceso_apoderados')->references('id')->on('procesos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('apoderado_id');
            $table->foreign('apoderado_id', 'fk_apoderados_proceso')->references('id')->on('apoderados')->onDelete('cascade')->onUpdate('restrict');
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
        Schema::dropIfExists('apoderados_proceso');
    }
}
