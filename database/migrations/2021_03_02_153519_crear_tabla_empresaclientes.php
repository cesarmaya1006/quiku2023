<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEmpresaclientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresaclientes', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id', 'fk_cliente_empresa')->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_docu_id');
            $table->foreign('tipo_docu_id', 'fk_docutipos_empresaclientes')->references('id')->on('docutipos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('identificacion', 20)->unique();
            $table->string('nombre', 255);
            $table->string('direccion', 255);
            $table->string('email', 100);
            $table->string('telefono', 15);
            $table->string('nom_contacto', 255);
            $table->string('tel_contacto', 15);
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('empresaclientes');
    }
}
