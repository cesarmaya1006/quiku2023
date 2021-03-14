<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaActuaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actuaciones', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('proceso_id');
            $table->foreign('proceso_id', 'fk_actuaciones_procesos')->references('id')->on('procesos')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_actuacion');
            $table->string('descripcion_actuacion', 1000);
            $table->bigInteger('termino')->nullable();
            $table->date('fecha_finalizacion');
            $table->string('apoderado', 100);
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
        Schema::dropIfExists('actuaciones');
    }
}
