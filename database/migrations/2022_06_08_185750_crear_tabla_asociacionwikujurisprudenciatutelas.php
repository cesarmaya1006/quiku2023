<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsociacionwikujurisprudenciatutelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociacionwikujurisprudenciatutelas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('wikujurisprudencia_id');
            $table->foreign('wikujurisprudencia_id', 'fk_wikujurisprudencia_submotivotutelas')->references('id')->on('wikujurisprudencia')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('submotivotutela_id');
            $table->foreign('submotivotutela_id', 'fk_submotivotutelas_wikujurisprudencia')->references('id')->on('submotivotutelas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('asociacionwikujurisprudenciatutelas');
    }
}
