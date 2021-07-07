<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSolicituddatossolicitudes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituddatossolicitudes', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('solicituddatos_id');
            $table->foreign('solicituddatos_id', 'fk_solicituddatos_solicitud')->references('id')->on('solicituddatos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->default('5')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_solicitud')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('tiposolicitud');
            $table->longText('datossolicitud');
            $table->longText('descripcionsolicitud');
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
        Schema::dropIfExists('solicituddatossolicitudes');
    }
}
