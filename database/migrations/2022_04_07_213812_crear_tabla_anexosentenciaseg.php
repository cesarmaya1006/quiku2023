<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAnexosentenciaseg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexosentenciaseg', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('sentenciaseginstancia_id');
            $table->foreign('sentenciaseginstancia_id', 'fk_sentenciaseginstancia_anexo')->references('id')->on('sentenciaseginstancia')->onDelete('restrict')->onUpdate('restrict');
            $table->string('titulo_anexo', 255)->nullable();
            $table->string('descripcion_anexo', 255)->nullable();
            $table->string('url_anexo', 255)->nullable();
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
        Schema::dropIfExists('anexosentenciaseg');
    }
}
