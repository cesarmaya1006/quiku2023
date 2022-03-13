<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaImpugnacionInternaResuelve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impugnacion_interna_resuelve', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('impugnacion_interna_id');
            $table->foreign('impugnacion_interna_id', 'fk_impugnacion_interna_resuelvesentencia')->references('id')->on('impugnacion_interna')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('resuelve_primera_instancia_id');
            $table->foreign('resuelve_primera_instancia_id', 'fk_resuelvesentencia_impugnacion_interna')->references('id')->on('resuelvesentencia')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('impugnacion_interna_resuelve');
    }
}
