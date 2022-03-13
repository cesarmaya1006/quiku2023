<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAccionanteAccionado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accionante_accionado', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('auto_admisorio_id');
            $table->foreign('auto_admisorio_id', 'fk_auto_admisorio_accionante_accionado')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_accion_id');
            $table->foreign('tipo_accion_id', 'fk_tipo_accion_accions')->references('id')->on('tipo_accion')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_persona_id');
            $table->foreign('tipo_persona_id', 'fk_tipo_persona_accions')->references('id')->on('tipo_persona')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('docutipos_id_accion');
            $table->foreign('docutipos_id_accion', 'fk_persona_accion')->references('id')->on('docutipos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('numero_documento_accion', 30)->nullable();
            $table->string('nombres_accion', 255)->nullable();
            $table->string('apellidos_accion', 255)->nullable();
            $table->string('correo_accion', 255)->nullable();
            $table->string('direccion_accion', 255)->nullable();
            $table->string('telefono_accion', 255)->nullable();
            $table->string('nombre_apoderado', 255)->nullable();
            $table->unsignedBigInteger('docutipos_id_apoderado')->nullable();
            $table->foreign('docutipos_id_apoderado', 'fk_persona_apoderado')->references('id')->on('docutipos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('numero_documento_apoderado', 255)->nullable();
            $table->string('tarjeta_profesional_apoderado', 255)->nullable();
            $table->string('correo_apoderado', 255)->nullable();
            $table->string('direccion_apoderado', 255)->nullable();
            $table->string('telefono_apoderado', 255)->nullable();
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
        Schema::dropIfExists('accionante_accionado');
    }
}
