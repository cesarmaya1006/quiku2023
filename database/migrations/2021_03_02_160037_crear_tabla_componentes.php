<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaComponentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentes', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('proyecto_id');
            $table->foreign('proyecto_id', 'fk_proyecto_componentes')->references('id')->on('proyectos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id', 'fk_responsable_componente')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('titulo', 255);
            $table->date('fec_creacion');
            $table->longText('objetivo');
            $table->string('estado', 20)->default('Nueva');
            $table->string('impacto', 10);
            $table->double('progreso')->default(0);
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
        Schema::dropIfExists('componentes');
    }
}
