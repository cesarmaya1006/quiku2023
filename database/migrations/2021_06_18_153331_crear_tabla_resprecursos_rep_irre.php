<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaResprecursosRepIrre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resprecursos_rep_irre', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('recursos_rep_irre_id');
            $table->foreign('recursos_rep_irre_id', 'fk_recursos_rep_irre_respuesta')->references('id')->on('recursos_rep_irre')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('resprecursos_rep_irre');
    }
}
