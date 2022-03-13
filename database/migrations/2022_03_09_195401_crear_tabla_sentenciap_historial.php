<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSentenciapHistorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentenciap_historial', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('sentenciapinstancia_id');
            $table->foreign('sentenciapinstancia_id', 'fk_sentenciap_sentenciap_historial')->references('id')->on('sentenciapinstancia')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('resuelvesentencia_id')->nullable();
            $table->foreign('resuelvesentencia_id', 'fk_resuelvesentencia_sentenciap_historial')->references('id')->on('resuelvesentencia')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_sentenciap_historial')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('historial')->nullable();
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
        Schema::dropIfExists('sentenciap_historial');
    }
}
