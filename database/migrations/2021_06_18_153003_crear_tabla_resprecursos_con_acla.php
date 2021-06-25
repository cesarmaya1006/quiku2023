<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaResprecursosConAcla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resprecursos_con_acla', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('recursos_con_acla_id');
            $table->foreign('recursos_con_acla_id', 'fk_recursos_con_acla_respuesta')->references('id')->on('recursos_con_acla')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha', 100);
            $table->longText('respuesta');
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
        Schema::dropIfExists('resprecursos_con_acla');
    }
}
