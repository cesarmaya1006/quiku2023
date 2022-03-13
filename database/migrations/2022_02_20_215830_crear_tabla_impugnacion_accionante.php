<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaImpugnacionAccionante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impugnacion_accionante', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('impugnacionresuelve_id');
            $table->foreign('impugnacionresuelve_id', 'fk_impugnacionresuelve_accionante_accionados')->references('id')->on('impugnacionresuelve')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('accionante_accionado_id');
            $table->foreign('accionante_accionado_id', 'fk_accionante_accionados_impugnaciones')->references('id')->on('accionante_accionado')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('impugnacion_accionante');
    }
}
