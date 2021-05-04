<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDenuncias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->text('radicado', 255)->nullable();
            $table->unsignedBigInteger('tipo_pqr_id')->default(6);
            $table->foreign('tipo_pqr_id', 'fk_tipoPQR_denuncias')->references('id')->on('tipo_pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign('persona_id', 'fk_persona_denuncias')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id', 'fk_empresa_denuncias')->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_denuncias')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->text('solicitud');
            $table->boolean('prorroga')->default(0)->nullable();
            $table->unsignedBigInteger('sede_id')->nullable();
            $table->foreign('sede_id', 'fk_sede_denuncias')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_generacion');
            $table->date('fecha_radicado');
            $table->date('fecha_respuesta')->nullable();
            $table->string('estado')->default('Radicada, sin iniciar tramite');
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
        Schema::dropIfExists('denuncias');
    }
}
