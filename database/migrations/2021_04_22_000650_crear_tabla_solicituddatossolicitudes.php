<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSolicituddatossolicitudes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituddatossolicitudes', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('solicituddatos_id');
            $table->foreign('solicituddatos_id', 'fk_solicituddatos_solicitud')->references('id')->on('solicituddatos')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('tiposolicitud');
            $table->longText('datossolicitud');
            $table->longText('descripcionsolicitud');
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
        Schema::dropIfExists('solicituddatossolicitudes');
    }
}
