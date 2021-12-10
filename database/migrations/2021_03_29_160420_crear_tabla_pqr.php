<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPqr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pqr', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->text('radicado', 255)->nullable();
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_pqr')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign('persona_id', 'fk_persona_pqr')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id', 'fk_empresa_pqr')->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_pqr_id')->nullable();
            $table->foreign('tipo_pqr_id', 'fk_tipoPQR_pqr')->references('id')->on('tipo_pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->text('adquisicion', 100)->nullable();
            $table->unsignedBigInteger('sede_id')->nullable();
            $table->foreign('sede_id', 'fk_sede_pqr')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->text('tipo', 100)->nullable();
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->foreign('servicio_id', 'fk_servicio_pqr')->references('id')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->foreign('referencia_id', 'fk_referencia_pqr')->references('id')->on('referencias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('prioridad_id')->default(2)->nullable();
            $table->foreign('prioridad_id', 'fk_prioridades_pqr')->references('id')->on('prioridades')->onDelete('restrict')->onUpdate('restrict');
            $table->text('factura', 100)->nullable();
            $table->date('fecha_factura', 100)->nullable();
            $table->boolean('prorroga')->default(0)->nullable();
            $table->bigInteger('prorroga_dias')->default(0)->nullable();
            $table->longText('prorroga_pdf')->nullable();
            $table->timestamp('fecha_generacion')->nullable();
            $table->date('fecha_radicado')->nullable();
            $table->date('fecha_respuesta')->nullable();
            $table->bigInteger('tiempo_limite')->default(0);
            $table->boolean('estado_asignacion')->default(0)->nullable();
            $table->unsignedBigInteger('estadospqr_id')->nullable();
            $table->foreign('estadospqr_id', 'fk_estadospqr_pqr')->references('id')->on('estadospqr')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('estado_creacion')->default(0)->nullable();
            $table->boolean('recurso_aclaracion')->default(0);
            $table->boolean('recurso_reposicion')->default(0);
            $table->boolean('recurso_apelacion')->default(0);
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
        Schema::dropIfExists('pqr');
    }
}
