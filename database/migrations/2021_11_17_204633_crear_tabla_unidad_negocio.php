<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUnidadNegocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_negocio', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_unidad_negocio')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_persona_id');
            $table->foreign('tipo_persona_id', 'fk_tipo_persona_unidad_negocio')->references('id')->on('tipo_persona')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('docutipos_id');
            $table->foreign('docutipos_id', 'fk_persona_unidad_negocio')->references('id')->on('docutipos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('numero_documento', 30)->nullable();
            $table->string('nombres', 255)->nullable();
            $table->string('apellidos', 255)->nullable();
            $table->string('correo', 255)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('ciudad', 255)->nullable();
            $table->string('telefono', 255)->nullable();
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
        Schema::dropIfExists('unidad_negocio');
    }
}
