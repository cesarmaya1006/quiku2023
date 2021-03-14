<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearHvProceso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hv_proceso', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'fk_empleado_hvproceso')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha');
            $table->longText('descripcion');
            $table->string('inicio', 255);
            $table->string('descargos', 255)->nullable();
            $table->string('cierre', 255)->nullable();
            $table->string('recurso', 255)->nullable();
            $table->string('segunda', 255)->nullable();
            $table->string('estado', 255)->default('activo');
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
        Schema::dropIfExists('hv_proceso');
    }
}
