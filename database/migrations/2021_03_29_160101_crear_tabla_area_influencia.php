<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAreaInfluencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_influencia', function (Blueprint $table) {
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id', 'fk_sedes_departamento')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_departamento_sedes')->references('id')->on('departamento')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('area_influencia');
    }
}
