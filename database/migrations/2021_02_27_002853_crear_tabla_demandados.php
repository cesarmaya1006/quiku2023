<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDemandados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandados', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('proceso_id');
            $table->foreign('proceso_id', 'fk_demandando_procesos')->references('id')->on('procesos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('nombres', 255);
            $table->unsignedBigInteger('tipo_docu_id');
            $table->foreign('tipo_docu_id', 'fk_demandando_tipo_docu')->references('id')->on('docutipos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('identificacion', 100);
            $table->string('email', 255)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('direccion', 255)->nullable();
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
        Schema::dropIfExists('demandados');
    }
}
