<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPeticiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticiones', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('pqr_id');
            $table->foreign('pqr_id', 'fk_pqr_peticiones')->references('id')->on('pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('motivo_sub_id')->nullable();
            $table->foreign('motivo_sub_id', 'fk_motivo_peticiones')->references('id')->on('motivo_sub')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_peticiones')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('otro')->nullable();
            // Solicitud de info-datos 
            $table->longText('peticion')->nullable();
            $table->longText('indentifiquedocinfo')->nullable();
            // Solicitud de datos personales 
            $table->longText('tiposolicitud')->nullable();
            $table->longText('datossolicitud')->nullable();
            $table->longText('descripcionsolicitud')->nullable();
            // Concepto u opinión
            $table->longText('consulta')->nullable();
            // Reporte de irregularidad
            $table->longText('irregularidad')->nullable();
            // Felicitacion
            $table->text('nombre_funcionario')->nullable();
            $table->text('felicitacion')->nullable();
            // Sugerencia
            $table->text('sugerencia')->nullable();
            // Estado
            $table->unsignedBigInteger('estado_id')->default(1)->nullable();
            $table->foreign('estado_id', 'fk_estados_peticion')->references('id')->on('asignancion_estados')->onDelete('restrict')->onUpdate('restrict'); 
            $table->boolean('recurso')->default(0)->nullable();
            $table->boolean('usuario_recurso')->default(0)->nullable();
            $table->bigInteger('recurso_dias')->default(0);
            $table->date('fecha_notificacion')->nullable();
            $table->longText('justificacion')->nullable();
            $table->boolean('aclaracion')->default(0)->nullable();
            $table->boolean('apelacion')->default(0)->nullable();
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
        Schema::dropIfExists('peticiones');
    }
}
