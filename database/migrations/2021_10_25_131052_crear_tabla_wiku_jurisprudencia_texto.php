<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikuJurisprudenciaTexto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikujurisprudenciatexto', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('jurisprudencia_id');
            $table->foreign('jurisprudencia_id', 'fk_jurisprudencia_texto')->references('id')->on('wikujurisprudencia')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('texto');
            $table->longText('descripcion')->nullable();
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
        Schema::dropIfExists('wikujurisprudenciatexto');
    }
}
