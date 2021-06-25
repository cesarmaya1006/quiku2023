<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRecursosSoliInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos_soli_info', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('solicituddocinfopeticiones_id');
            $table->foreign('solicituddocinfopeticiones_id', 'fk_solicituddocinfopeticiones_recursos')->references('id')->on('solicituddocinfopeticiones')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_reposicion_id');
            $table->foreign('tipo_reposicion_id', 'fk_tipo_reposicion_recursos_soli_info')->references('id')->on('tipo_reposicion')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_radicacion');
            $table->longText('recurso');
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
        Schema::dropIfExists('recursos_soli_info');
    }
}
