<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikuargumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikuargumentos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('wikuautorinstitu_id')->nullable();
            $table->foreign('wikuautorinstitu_id', 'fk_argumento_wikuautorinstitu')->references('id')->on('wikuautorinstitu')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('wikuautores_id')->nullable();
            $table->foreign('wikuautores_id', 'fk_argumento_wikuautores')->references('id')->on('wikuautores')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('texto');
            $table->longText('descripcion')->nullable();
            $table->unsignedBigInteger('wikutemaespecifico_id')->nullable();
            $table->foreign('wikutemaespecifico_id', 'fk_temaespecifico_argumento')->references('id')->on('wikutemaespecifico')->onDelete('restrict')->onUpdate('restrict');
            $table->bigInteger('destacado')->default(0);
            $table->boolean('publico')->default(0);
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
        Schema::dropIfExists('wikuargumentos');
    }
}
