<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSolicitudesDocInfopeticiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudDocInfoPeticion', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('solicitudDocInfo_id');
            $table->foreign('solicitudDocInfo_id', 'fk_solicitudDocInfo_peticion')->references('id')->on('solicitudDocInfo')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('peticion');
            $table->longText('indentifiqueDocInfo');
            $table->longText('justificacion');
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
        Schema::dropIfExists('solicitudDocInfoPeticion');
    }
}
