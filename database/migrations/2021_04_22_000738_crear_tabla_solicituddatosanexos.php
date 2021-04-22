<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSolicituddatosanexos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituddatosanexos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('solicituddatossolicitud_id');
            $table->foreign('solicituddatossolicitud_id', 'fk_solicitudanexosolicitud_doc')->references('id')->on('solicituddatossolicitudes')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('solicituddatosanexos');
    }
}
