<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaResuelvesentenciaseg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resuelvesentenciaseg', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('sentenciaseginstancia_id');
            $table->foreign('sentenciaseginstancia_id', 'fk_sentenciaseginstancia_resuelve')->references('id')->on('sentenciaseginstancia')->onDelete('restrict')->onUpdate('restrict');
            $table->string('sentido', 255)->nullable();
            $table->boolean('gestion')->default(0)->nullable();
            $table->integer('numeracion')->nullable();
            $table->longText('resuelve')->nullable();
            $table->integer('dias')->nullable();
            $table->integer('horas')->nullable();
            $table->date('fecha_final')->nullable();
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
        Schema::dropIfExists('resuelvesentenciaseg');
    }
}
