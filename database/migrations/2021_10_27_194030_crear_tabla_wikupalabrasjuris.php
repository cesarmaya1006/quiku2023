<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikupalabrasjuris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikupalabrasjuris', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('wiku_jurisprudencia_id');
            $table->foreign('wiku_jurisprudencia_id', 'fk_jurisprudencia_palabra')->references('id')->on('wikujurisprudencia')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('wiku_palabras_id');
            $table->foreign('wiku_palabras_id', 'fk_palabra_jurisprudencia')->references('id')->on('wikupalabrasclave')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('wikupalabrasjuris');
    }
}
