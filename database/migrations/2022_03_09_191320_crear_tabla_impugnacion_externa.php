<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaImpugnacionExterna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impugnacion_externa', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('sentenciapinstancia_id');
            $table->foreign('sentenciapinstancia_id', 'fk_sentenciap_impugnacion')->references('id')->on('sentenciapinstancia')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha')->nullable();
            $table->string('titulo', 255)->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('url', 255);
            $table->string('extension', 255);
            $table->double('peso');
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
        Schema::dropIfExists('impugnacion_externa');
    }
}
