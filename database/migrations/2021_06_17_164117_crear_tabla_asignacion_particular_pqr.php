<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsignacionParticularPqr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_particular_pqr', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('tipo');
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign('persona_id', 'fk_persona_asignacion')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id', 'fk_empresa_asignacion')->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_pqr_id');
            $table->foreign('tipo_pqr_id', 'fk_tipoPQR_asignacion')->references('id')->on('tipo_pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->text('adquisicion', 100)->nullable();
            $table->unsignedBigInteger('sede_id')->nullable();
            $table->foreign('sede_id', 'fk_sede_asignacion')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->foreign('servicio_id', 'fk_servicio_asignacion')->references('id')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->foreign('referencia_id', 'fk_referencia_asignacion')->references('id')->on('referencias')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('asignacion_particular_pqr');
    }
}
