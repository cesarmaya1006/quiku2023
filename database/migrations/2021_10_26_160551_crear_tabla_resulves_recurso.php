<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaResulvesRecurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resuelves_recurso', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('pqr_id');
            $table->foreign('pqr_id', 'fk_pqr_resuelve_recurso')->references('id')->on('pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_resuelve_recurso')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('orden')->nullable();
            $table->foreign('orden', 'fk_ordinal_resuelve_recurso')->references('id')->on('numeracionordinal')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_reposicion_id');
            $table->foreign('tipo_reposicion_id', 'fk_tipo_reposicion_recursos_resuelve')->references('id')->on('tipo_reposicion')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('resuelve')->nullable();
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
        Schema::dropIfExists('resuelves_recurso');
    }
}
