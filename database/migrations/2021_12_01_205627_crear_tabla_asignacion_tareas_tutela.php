<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsignacionTareasTutela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignancion_tareas_tutela', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('auto_admisorio_id');
            $table->foreign('auto_admisorio_id', 'fk_auto_admisorio_asignancion_tareas')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_asignancion_tareas_tutela')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id', 'fk_estados_asignacion_tareas_tutela')->references('id')->on('asignacion_estados_tutela')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tareas_id')->nullable();
            $table->foreign('tareas_id', 'fk_tarea_asignancion_tareas_tutela')->references('id')->on('tareas_tutela')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('asignancion_tareas_tutela');
    }
}
