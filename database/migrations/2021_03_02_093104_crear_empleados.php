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
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id', 'fk_empresas_empleado')->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('hv_cargo_id');
            $table->foreign('hv_cargo_id', 'fk_cargo_empleado')->references('id')->on('hv_cargo')->onDelete('restrict')->onUpdate('restrict');
            $table->string('foto', 255)->default('usuario-inicial.jpg')->nullable();
            $table->string('sexo', 255);
            $table->date('vinculacion')->default(date('Y-m-d'))->nullable();
            $table->string('nacionalidad', 255)->nullable();
            $table->string('tipo_libreta', 255)->nullable();
            $table->string('n_libreta', 255)->nullable();
            $table->string('pais_nacimiento', 255)->nullable();
            $table->string('lugar_nacimiento', 255)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('pais_residencia', 255)->nullable();
            $table->string('departamento_residencia', 255)->nullable();
            $table->string('municipio_residencia', 255)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('telefono_fijo', 255)->nullable();
            $table->longText('descripcion')->nullable();
            $table->bigInteger('estado')->default(1);
            $table->boolean('lider')->default(0);
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
