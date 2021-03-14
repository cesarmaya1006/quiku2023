<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEmpresaproveedordoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresaproveedordoc', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('empresaproveedores_id');
            $table->foreign('empresaproveedores_id', 'fk_empresaproveedores_empresaproveedordoc')->references('id')->on('empresaproveedores')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha');
            $table->string('nombre', 255);
            $table->string('documento', 255);
            $table->string('descripcion', 255)->nullable();
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
        Schema::dropIfExists('empresaproveedordoc');
    }
}
