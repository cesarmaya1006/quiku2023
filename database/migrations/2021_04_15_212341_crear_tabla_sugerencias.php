<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSugerencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugerencias', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->text('radicado', 255)->nullable();
            $table->unsignedBigInteger('tipo_pqr_id')->default(9);
            $table->foreign('tipo_pqr_id', 'fk_tipoPQR_sugerencias')->references('id')->on('tipo_pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign('persona_id', 'fk_persona_sugerencias')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id', 'fk_empresa_sugerencias')->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_sugerencias')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->text('sugerencia');
            $table->boolean('prorroga')->default(0)->nullable();
            $table->unsignedBigInteger('sede_id')->nullable();
            $table->foreign('sede_id', 'fk_sede_sugerencias')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_generacion');
            $table->date('fecha_radicado');
            $table->date('fecha_respuesta')->nullable();
            $table->bigInteger('tiempo_limite')->default(0);
            $table->unsignedBigInteger('estadospqr_id')->nullable();
            $table->foreign('estadospqr_id', 'fk_estadossugerencia')->references('id')->on('estadospqr')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('sugerencias');
    }
}
