<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearIdiomas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idiomas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'fk_empleado_idiomas')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('idioma', 255);
            $table->string('habla', 255);
            $table->string('lee', 255);
            $table->string('escribe', 255);
            $table->string('examen', 255)->nullable();
            $table->date('fecha_examen')->nullable();
            $table->string('resultado', 255)->nullable();
            $table->string('soporte', 255)->nullable();
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
        Schema::dropIfExists('idiomas');
    }
}
