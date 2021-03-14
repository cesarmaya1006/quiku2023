<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDocumentoAnotacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_anotacion', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('anotacion_id');
            $table->foreign('anotacion_id', 'fk_anotacion_documento')->references('id')->on('anotacion')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_documento');
            $table->string('tipo_documento', 255);
            $table->string('nombre_doc', 255);
            $table->string('url_doc', 255);
            $table->string('usuario', 255);
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
        Schema::dropIfExists('documento_anotacion');
    }
}
