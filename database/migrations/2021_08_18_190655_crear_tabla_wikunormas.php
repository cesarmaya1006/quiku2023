<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikunormas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikunormas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('fuente_id');
            $table->foreign('fuente_id', 'fk_fuente_document')->references('id')->on('wikudocument')->onDelete('restrict')->onUpdate('restrict');
            $table->string('articulo', 255);
            $table->date('fecha')->nullable();
            $table->longText('texto');
            $table->longText('descripcion')->nullable();
            $table->string('libro', 255)->nullable();
            $table->string('parte', 255)->nullable();
            $table->string('seccion', 255)->nullable();
            $table->string('titulo', 255)->nullable();
            $table->string('capitulo', 255)->nullable();
            $table->unsignedBigInteger('wikutemaespecifico_id')->nullable();
            $table->foreign('wikutemaespecifico_id', 'fk_temaespecifico_norma')->references('id')->on('wikutemaespecifico')->onDelete('restrict')->onUpdate('restrict');
            $table->bigInteger('destacado')->default(0);
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
        Schema::dropIfExists('wikunormas');
    }
}
