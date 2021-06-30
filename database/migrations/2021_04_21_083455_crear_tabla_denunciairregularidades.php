<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDenunciairregularidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denunciairregularidades', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('denuncias_id');
            $table->foreign('denuncias_id', 'fk_denuncias_irregularidad')->references('id')->on('denuncias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->default('5')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_irregularidad')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('irregularidad');
            $table->longText('otro')->nullable();
            $table->boolean('recurso')->default(0)->nullable();
            $table->boolean('usuario_recurso')->default(0)->nullable();
            $table->bigInteger('recurso_dias')->default(0);
            $table->date('fecha_notificacion')->nullable();
            $table->boolean('aclaracion')->default(0)->nullable();
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
        Schema::dropIfExists('denunciairregularidades');
    }
}
