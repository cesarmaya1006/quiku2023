<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRefCargo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_cargo', function (Blueprint $table) {
            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id', 'fk_cargos_referencias')->references('id')->on('cargos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('referencia_id');
            $table->foreign('referencia_id', 'fk_referencias_cargos')->references('id')->on('referencias')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('ref_cargo');
    }
}
