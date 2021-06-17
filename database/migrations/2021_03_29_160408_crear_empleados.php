<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->foreign('id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('docutipos_id');
            $table->foreign('docutipos_id', 'fk_empleado_docutipos')->references('id')->on('docutipos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id', 'fk_empleado_cargos')->references('id')->on('cargos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id', 'fk_sedes_empleado')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('estado')->default(1);
            $table->string('identificacion', 100)->unique();
            $table->string('nombre1', 50);
            $table->string('nombre2', 50)->nullable();
            $table->string('apellido1', 50);
            $table->string('apellido2', 50)->nullable();
            $table->string('telefono_celu', 30);
            $table->string('direccion', 255);
            $table->string('genero', 20);
            $table->date('fecha_nacimiento');
            $table->string('email')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
