<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaJuzgados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juzgados', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('jurisdiccion_juzgado_id');
            $table->foreign('jurisdiccion_juzgado_id', 'fk_juzgado_jurisdiccion_juzgado')->references('id')->on('jurisdiccion_juzgado')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id', 'fk_juzgado_municipio')->references('id')->on('juzgmunicipios')->onDelete('restrict')->onUpdate('restrict');
            $table->string('codigo_despacho', 255)->unique();
            $table->string('despacho', 255);
            $table->string('juez', 255);
            $table->string('email', 255);
            $table->string('direccion', 255);
            $table->string('telefono', 255);
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
        Schema::dropIfExists('juzgados');
    }
}
