<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCodProcesos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_procesos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('procesos_id');
            $table->foreign('procesos_id', 'fk_cod_proceso_procesos')->references('id')->on('procesos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('nuevo_cod', 255);
            $table->date('fecha_nuevo_proceso');
            $table->string('usuario_cambio', 255);
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
        Schema::dropIfExists('cod_procesos');
    }
}
