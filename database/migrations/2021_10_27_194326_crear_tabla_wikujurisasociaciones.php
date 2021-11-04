<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikujurisasociaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikujurisasociaciones', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('prodserv');
            $table->unsignedBigInteger('tipo_p_q_r_id')->nullable();
            $table->foreign('tipo_p_q_r_id', 'fk_tipoPQR_jurisprudencia')->references('id')->on('tipo_pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('motivo_id')->nullable();
            $table->foreign('motivo_id', 'fk_motivo_jurisprudencia')->references('id')->on('motivos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('motivo_sub_id')->nullable();
            $table->foreign('motivo_sub_id', 'fk_motivo_sub_jurisprudencia')->references('id')->on('motivo_sub')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->foreign('servicio_id', 'fk_servicio_jurisprudencia')->references('id')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id', 'fk_categoria_jurisprudencia')->references('id')->on('categorias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id', 'fk_producto_jurisprudencia')->references('id')->on('productos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id', 'fk_marca_jurisprudencia')->references('id')->on('marcas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->foreign('referencia_id', 'fk_referencia_jurisprudencia')->references('id')->on('referencias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('wiku_jurisprudencia_id');
            $table->foreign('wiku_jurisprudencia_id', 'fk_juris_jurisprudencia')->references('id')->on('wikujurisprudencia')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('wikujurisasociaciones');
    }
}
