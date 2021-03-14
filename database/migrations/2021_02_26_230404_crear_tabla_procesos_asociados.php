<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProcesosAsociados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos_asociados', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('proceso_principal_id');
            $table->foreign('proceso_principal_id', 'fk_proceso_principal_procesos')->references('id')->on('procesos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('proceso_asociado_id');
            $table->foreign('proceso_asociado_id', 'fk_proceso_asociado_procesos')->references('id')->on('procesos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('procesos_asociados');
    }
}
