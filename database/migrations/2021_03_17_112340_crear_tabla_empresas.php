<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('representante_id')->nullable();
            $table->foreign('representante_id', 'fk_representante_empresa')->references('id')->on('representantes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('docutipos_id');
            $table->foreign('docutipos_id', 'fk_empresa_docutipos')->references('id')->on('docutipos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('identificacion', 100);
            $table->string('dv', 2);
            $table->string('razon_social', 255);
            $table->string('direccion', 255);
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id', 'fk_pais_empresa')->references('id')->on('pais')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->foreign('municipio_id', 'fk_municipio_empresa')->references('id')->on('municipio')->onDelete('restrict')->onUpdate('restrict');
            $table->string('telefono_fijo', 30)->nullable();
            $table->string('telefono_celu', 30);
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
        Schema::dropIfExists('empresas');
    }
}
