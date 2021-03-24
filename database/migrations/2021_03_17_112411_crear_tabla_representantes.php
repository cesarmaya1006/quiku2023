<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRepresentantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->foreign('id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id', 'fk_empresa_representante')->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('docutipos_id');
            $table->foreign('docutipos_id', 'fk_representante_docutipos')->references('id')->on('docutipos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('identificacion', 100)->unique();
            $table->string('nombre1', 50);
            $table->string('nombre2', 50)->nullable();
            $table->string('apellido1', 50);
            $table->string('apellido2', 50)->nullable();
            $table->string('telefono_fijo', 30)->nullable();
            $table->string('telefono_celu', 30);
            $table->string('direccion', 255);
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id', 'fk_pais_representante')->references('id')->on('pais')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->foreign('municipio_id', 'fk_municipio_representante')->references('id')->on('municipio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id', 'fk_nacionalidad_representante')->references('id')->on('pais')->onDelete('restrict')->onUpdate('restrict');
            $table->string('grado_educacion', 100);
            $table->string('genero', 20);
            $table->date('fecha_nacimiento');
            $table->string('grupo_etnico', 255);
            $table->boolean('discapacidad')->default(0);
            $table->string('tipo_discapacidad', 255)->nullable();
            $table->string('email')->unique();
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
        Schema::dropIfExists('representantes');
    }
}
