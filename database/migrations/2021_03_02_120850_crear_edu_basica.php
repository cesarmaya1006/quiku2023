<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearEduBasica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_basica', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'fk_empleado_edubasica')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('completa', 255);
            $table->string('ultimo_cursado', 255);
            $table->string('titulo', 255);
            $table->string('establecimiento', 255);
            $table->date('fecha_ultimo');
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
        Schema::dropIfExists('edu_basica');
    }
}
