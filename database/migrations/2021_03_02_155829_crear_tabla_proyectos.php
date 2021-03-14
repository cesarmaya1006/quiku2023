<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('titulo', 255);
            $table->date('fec_creacion');
            $table->date('fec_cierre')->nullable();
            $table->longText('objetivo');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id', 'fk_empresa_proyecto')->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('lider_id');
            $table->foreign('lider_id', 'fk_lider_proyecto')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('estado', 20)->default('Nuevo');
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
        Schema::dropIfExists('proyectos');
    }
}
