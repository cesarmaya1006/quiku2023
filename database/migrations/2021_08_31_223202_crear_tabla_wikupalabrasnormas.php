<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikupalabrasnormas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikupalabrasnormas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('wiku_norma_id');
            $table->foreign('wiku_norma_id', 'fk_norma_palabra')->references('id')->on('wikunormas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('wiku_palabras_id');
            $table->foreign('wiku_palabras_id', 'fk_palabra_norma')->references('id')->on('wikupalabrasclave')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('wikupalabrasnormas');
    }
}
