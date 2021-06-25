<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSolicituddocinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituddocinfo', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->text('radicado', 255)->nullable();
            $table->unsignedBigInteger('tipo_pqr_id')->default(8);
            $table->foreign('tipo_pqr_id', 'fk_tipoPQR_solicituddocinfo')->references('id')->on('tipo_pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign('persona_id', 'fk_persona_solicituddocinfo')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id', 'fk_empresa_solicituddocinfo')->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('prorroga')->default(0)->nullable();
            $table->bigInteger('prorroga_dias')->default(0)->nullable();
            $table->string('prorroga_pdf')->nullable();
            $table->unsignedBigInteger('sede_id')->nullable();
            $table->foreign('sede_id', 'fk_sede_solicituddocinfo')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('prioridad_id')->default(2)->nullable();
            $table->foreign('prioridad_id', 'fk_prioridades_solicituddocinfo')->references('id')->on('prioridades')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_generacion');
            $table->date('fecha_radicado');
            $table->date('fecha_respuesta')->nullable();
            $table->bigInteger('tiempo_limite')->default(0);
            $table->unsignedBigInteger('estadospqr_id')->nullable();
            $table->foreign('estadospqr_id', 'fk_estadossolicituddocinfo')->references('id')->on('estadospqr')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('solicituddocinfo');
    }
}
