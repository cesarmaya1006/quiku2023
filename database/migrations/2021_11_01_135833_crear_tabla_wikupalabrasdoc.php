<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikupalabrasdoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikupalabrasdoc', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('wiku_doctrina_id');
            $table->foreign('wiku_doctrina_id', 'fk_doctrina_palabra')->references('id')->on('wikudoctrinas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('wiku_palabras_id');
            $table->foreign('wiku_palabras_id', 'fk_palabra_doctrina')->references('id')->on('wikupalabrasclave')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('wikupalabrasdoc');
    }
}
