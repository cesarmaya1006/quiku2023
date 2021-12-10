<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRespuestaPretensiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_pretensiones', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('auto_admisorio_id');
            $table->foreign('auto_admisorio_id', 'fk_auto_admisorio_rp')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha');
            $table->longText('respuesta')->nullable();
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
        Schema::dropIfExists('respuesta_pretensiones');
    }
}
