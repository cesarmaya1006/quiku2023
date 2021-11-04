<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikudocasociaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikudocasociaciones', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('prodserv');
            $table->unsignedBigInteger('tipo_p_q_r_id')->nullable();
            $table->foreign('tipo_p_q_r_id', 'fk_tipoPQR_doctrina')->references('id')->on('tipo_pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('motivo_id')->nullable();
            $table->foreign('motivo_id', 'fk_motivo_doctrina')->references('id')->on('motivos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('motivo_sub_id')->nullable();
            $table->foreign('motivo_sub_id', 'fk_motivo_sub_doctrina')->references('id')->on('motivo_sub')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->foreign('servicio_id', 'fk_servicio_doctrina')->references('id')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id', 'fk_categoria_doctrina')->references('id')->on('categorias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id', 'fk_producto_doctrina')->references('id')->on('productos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id', 'fk_marca_doctrina')->references('id')->on('marcas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->foreign('referencia_id', 'fk_referencia_doctrina')->references('id')->on('referencias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('wiku_doctrina_id');
            $table->foreign('wiku_doctrina_id', 'fk_doc_doctrina')->references('id')->on('wikudoctrinas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('wikudocasociaciones');
    }
}
