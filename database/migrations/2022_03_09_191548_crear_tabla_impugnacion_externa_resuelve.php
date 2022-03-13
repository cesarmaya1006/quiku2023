<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaImpugnacionExternaResuelve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impugnacion_externa_resuelve', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('impugnacion_externa_id');
            $table->foreign('impugnacion_externa_id', 'fk_impugnacion_externa_resuelvesentencia')->references('id')->on('impugnacion_externa')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('resuelve_primera_instancia_id');
            $table->foreign('resuelve_primera_instancia_id', 'fk_resuelvesentencia_impugnacion_externa')->references('id')->on('resuelvesentencia')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('impugnacion_externa_resuelve');
    }
}
