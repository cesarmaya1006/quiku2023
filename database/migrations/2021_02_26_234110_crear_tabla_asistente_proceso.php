<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsistenteProceso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistente_proceso', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('procesos_id');
            $table->foreign('procesos_id', 'fk_proceso_asistente')->references('id')->on('procesos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('asistente_id');
            $table->foreign('asistente_id', 'fk_asistente_proceso')->references('id')->on('asistentes')->onDelete('cascade')->onUpdate('restrict');
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
        Schema::dropIfExists('asistente_proceso');
    }
}
