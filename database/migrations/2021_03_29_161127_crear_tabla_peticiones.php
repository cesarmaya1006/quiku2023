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
            $table->unsignedBigInteger('motivo_sub_id');
            $table->foreign('motivo_sub_id', 'fk_motivo_peticiones')->references('id')->on('motivo_sub')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('otro')->nullable();
            $table->boolean('prorroga')->default(0);
            $table->date('fecha_radicado');
            $table->date('fecha_respuesta');
            $table->boolean('recurso')->default(0);
            $table->integer('dias_max_recurso')->nullable();
            $table->date('fecha_max_recurso')->nullable();
            $table->date('fecha_not_recurso')->nullable();
            $table->longText('justificacion');
            $table->string('estado')->default('Radicada, sin iniciar tramite');
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
