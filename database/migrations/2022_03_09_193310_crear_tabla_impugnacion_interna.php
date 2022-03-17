<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaImpugnacionInterna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impugnacion_interna', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('sentenciapinstancia_id');
            $table->foreign('sentenciapinstancia_id', 'fk_sentenciap_impugnacion_interna')->references('id')->on('sentenciapinstancia')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('resuelvesentencia_id');
            $table->foreign('resuelvesentencia_id', 'fk_resuelvesentencia_impugnacion_interna_id')->references('id')->on('resuelvesentencia')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'fk_empleado_impugnacion')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estado_id')->default(1)->nullable();
            $table->foreign('estado_id', 'fk_estados_impugnacion_interna')->references('id')->on('asignacion_estados_tutela')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('resuelve')->nullable();
            $table->integer('consecutivo');
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
        Schema::dropIfExists('impugnacion_interna');
    }
}
