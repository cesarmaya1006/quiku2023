<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaHistoriales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiales', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('tarea_id');
            $table->foreign('tarea_id', 'fk_tarea_historial')->references('id')->on('tareas')->onDelete('restrict')->onUpdate('restrict');
            $table->string('titulo', 255);
            $table->date('fecha');
            $table->longText('resumen');
            $table->unsignedBigInteger('usuariohistorial_id');
            $table->foreign('usuariohistorial_id', 'fk_usuario_historial')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('usuarioasignado_id');
            $table->foreign('usuarioasignado_id', 'fk_usuarioasignado_tarea')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->bigInteger('progreso')->default(0);
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
        Schema::dropIfExists('historiales');
    }
}
