<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsignancionTareas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignancion_tareas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('pqr_id');
            $table->foreign('pqr_id', 'fk_pqr_asignancion_tareas')->references('id')->on('pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_asignancion_tareas')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id', 'fk_estados_asignancion_tareas')->references('id')->on('asignancion_estados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tareas_id')->nullable();
            $table->foreign('tareas_id', 'fk_tarea_asignancion_tareas')->references('id')->on('tareas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('asignancion_tareas');
    }
}
