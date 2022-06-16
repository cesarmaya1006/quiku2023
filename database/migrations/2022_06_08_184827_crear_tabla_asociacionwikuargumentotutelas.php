<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsociacionwikuargumentotutelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociacionwikuargumentotutelas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('wiku_argumento_id');
            $table->foreign('wiku_argumento_id', 'fk_wikuargumentos_submotivotutelas')->references('id')->on('wikuargumentos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('submotivotutela_id');
            $table->foreign('submotivotutela_id', 'fk_submotivotutelas_wikuargumentos')->references('id')->on('submotivotutelas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('asociacionwikuargumentotutelas');
    }
}
