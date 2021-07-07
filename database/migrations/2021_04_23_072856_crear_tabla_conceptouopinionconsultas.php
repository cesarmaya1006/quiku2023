<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaConceptouopinionconsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptouopinionconsultas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('conceptouopinion_id');
            $table->foreign('conceptouopinion_id', 'fk_conceptouopinion_consulta')->references('id')->on('conceptouopinion')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->default('5')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_consulta')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('consulta');
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
        Schema::dropIfExists('conceptouopinionconsultas');
    }
}
