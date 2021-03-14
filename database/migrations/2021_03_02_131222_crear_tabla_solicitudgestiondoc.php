<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSolicitudgestiondoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudgestiondoc', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('solicitudgestion_id');
            $table->foreign('solicitudgestion_id', 'fk_solicitudgestion_solicitudgestiondoc')->references('id')->on('solicitudgestion')->onDelete('restrict')->onUpdate('restrict');
            $table->string('titulo', 255);
            $table->string('archivo', 255);
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
        Schema::dropIfExists('solicitudgestiondoc');
    }
}
