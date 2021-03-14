<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTareas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('componente_id');
            $table->foreign('componente_id', 'fk_componente_tarea')->references('id')->on('componentes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id', 'fk_responsable_tarea')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('titulo', 255);
            $table->date('fec_creacion');
            $table->date('fec_limite');
            $table->date('fec_finalizacion')->nullable();
            $table->longText('objetivo');
            $table->bigInteger('progreso')->default(0);
            $table->string('estado', 20)->default('Nueva');
            $table->string('impacto', 10);
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
        Schema::dropIfExists('tareas');
    }
}
