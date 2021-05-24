<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaServCargo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serv_cargo', function (Blueprint $table) {
            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id', 'fk_cargos_servicios')->references('id')->on('cargos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id', 'fk_servicios_cargos')->references('id')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('serv_cargo');
    }
}
