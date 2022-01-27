<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaResuelvesentencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resuelvesentencia', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('sentenciapinstancia_id');
            $table->foreign('sentenciapinstancia_id', 'fk_sentenciap_resuelve')->references('id')->on('sentenciapinstancia')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('numeracion')->nullable();
            $table->string('resuelve', 255)->nullable();
            $table->integer('dias')->nullable();
            $table->integer('horas')->nullable();
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
        Schema::dropIfExists('resuelvesentencia');
    }
}
