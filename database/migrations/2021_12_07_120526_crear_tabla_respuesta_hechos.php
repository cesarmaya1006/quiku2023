<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRespuestaHechos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_hechos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('auto_admisorio_id');
            $table->foreign('auto_admisorio_id', 'fk_auto_admisorio_rh')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha');
            $table->longText('respuesta')->nullable();
            $table->unsignedBigInteger('estado_id')->default(1)->nullable();
            $table->foreign('estado_id', 'fk_estados_repuesta_hechos_tutela')->references('id')->on('asignacion_estados_tutela')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_respuesta_hecho')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('respuesta_hechos');
    }
}
