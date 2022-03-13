<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaImpugnacionExternaAccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impugnacion_externa_accion', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('impugnacion_externa_id');
            $table->foreign('impugnacion_externa_id', 'fk_impugnacion_externa_accionante_accionados')->references('id')->on('impugnacion_externa')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('accionante_accionado_id');
            $table->foreign('accionante_accionado_id', 'fk_accionante_accionados_impugnacion_externa')->references('id')->on('accionante_accionado')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('impugnacion_externa_accion');
    }
}
