<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSentenciaseginstancia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentenciaseginstancia', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->foreign('id')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_sentencia')->nullable();
            $table->date('fecha_notificacion')->nullable();
            $table->string('sentencia', 255)->nullable();
            $table->string('url_sentencia', 255)->nullable();
            $table->boolean('cantidad_resuelves')->default(0)->nullable();
            $table->boolean('verificada')->default(0);
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
        Schema::dropIfExists('sentenciaseginstancia');
    }
}
