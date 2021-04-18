<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSugerenciasdoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugerenciasdoc', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('sugerencia_id');
            $table->foreign('sugerencia_id', 'fk_sugerencias_doc')->references('id')->on('sugerencias')->onDelete('restrict')->onUpdate('restrict');
            $table->string('titulo', 255);
            $table->string('descripcion', 255);
            $table->string('extension', 255);
            $table->text('url');
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
        Schema::dropIfExists('sugerenciasdoc');
    }
}
