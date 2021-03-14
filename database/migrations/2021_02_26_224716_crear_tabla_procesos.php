<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProcesos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('estado_notifi', 255)->default('Sin Notificar');
            $table->date('fecha_notifi')->nullable();
            $table->date('fecha_conoci_juridi')->nullable();
            $table->string('codigo_unico_proceso', 255);
            $table->string('codigo_unico_proceso_act', 255);
            $table->date('fecha_admin')->nullable();
            $table->date('fecha_radicacion')->nullable();
            $table->unsignedBigInteger('juzgado_id');
            $table->foreign('juzgado_id', 'fk_proceso_juzgado')->references('id')->on('juzgados')->onDelete('restrict')->onUpdate('restrict');
            $table->bigInteger('cuantia')->nullable()->default(0);
            $table->unsignedBigInteger('tipo_proceso_id');
            $table->foreign('tipo_proceso_id', 'fk_proceso_tipo_proceso')->references('id')->on('tipo_proceso')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estado_proceso_id');
            $table->foreign('estado_proceso_id', 'fk_proceso_estado_proceso')->references('id')->on('estado_proceso')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('etapa_proceso_id');
            $table->foreign('etapa_proceso_id', 'fk_proceso_etapa_proceso')->references('id')->on('etapa_proceso')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('riesgo_perdida_id');
            $table->foreign('riesgo_perdida_id', 'fk_proceso_riesgo_perdida')->references('id')->on('riesgo_perdida')->onDelete('restrict')->onUpdate('restrict');
            $table->string('fallo_1era', 255)->nullable();
            $table->date('fecha_ejecutoria_1era')->nullable();
            $table->string('condena_1era', 255)->nullable();
            $table->string('fallo_2da', 255)->nullable();
            $table->date('fecha_ejecutoria_2da')->nullable();
            $table->string('condena_2da', 255)->nullable();
            $table->string('fallo_3era', 255)->nullable();
            $table->date('fecha_ejecutoria_3era')->nullable();
            $table->string('condena_3era', 255)->nullable();
            $table->string('terminacion_anormal', 255)->nullable();
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
        Schema::dropIfExists('procesos');
    }
}
