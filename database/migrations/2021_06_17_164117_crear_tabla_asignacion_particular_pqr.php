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
            $table->string('prodserv');
            $table->bigInteger('cantidad');
            $table->unsignedBigInteger('tipo_pqr_id');
            $table->foreign('tipo_pqr_id', 'fk_tipoPQR_asignacion')->references('id')->on('tipo_pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('motivo_id')->nullable();
            $table->foreign('motivo_id', 'fk_motivo_asignacion')->references('id')->on('motivos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('motivo_sub_id')->nullable();
            $table->foreign('motivo_sub_id', 'fk_motivo_sub_asignacion')->references('id')->on('motivo_sub')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->foreign('servicio_id', 'fk_servicio_asignacion')->references('id')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id', 'fk_categoria_asignacion')->references('id')->on('categorias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id', 'fk_producto_asignacion')->references('id')->on('productos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id', 'fk_marca_asignacion')->references('id')->on('marcas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->foreign('referencia_id', 'fk_referencia_asignacion')->references('id')->on('referencias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('sede_id')->nullable();
            $table->foreign('sede_id', 'fk_sede_asignacion')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('cargo_id')->nullable();
            $table->foreign('cargo_id', 'fk_cargo_asignacion')->references('id')->on('cargos')->onDelete('restrict')->onUpdate('restrict');
            $table->text('adquisicion', 100)->nullable();
            $table->string('palabra1', 255)->nullable();
            $table->string('palabra2', 255)->nullable();
            $table->string('palabra3', 255)->nullable();
            $table->string('palabra4', 255)->nullable();
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
