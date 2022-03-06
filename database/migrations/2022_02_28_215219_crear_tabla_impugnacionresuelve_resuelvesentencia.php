<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaImpugnacionresuelveResuelvesentencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impugnacionresuelve_resuelvesentencia', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();

            $table->unsignedBigInteger('impugnacion_resuelve_id');
            $table->foreign('impugnacion_resuelve_id', 'fk_impugnacionresuelve_resuelvesentencia')->references('id')->on('impugnacionresuelve')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('resuelve_primera_instancia_id');
            $table->foreign('resuelve_primera_instancia_id', 'fk_resuelvesentencia_impugnaciones')->references('id')->on('resuelvesentencia')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('impugnacionresuelve_resuelvesentencia');
    }
}
