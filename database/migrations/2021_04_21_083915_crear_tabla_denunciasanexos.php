<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDenunciasanexos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denunciasanexos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('denuncia_id');
            $table->foreign('denuncia_id', 'fk_denuncias_doc')->references('id')->on('denuncias')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('denunciasanexos');
    }
}
