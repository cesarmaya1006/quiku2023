<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTipoPqr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_pqr', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('tipo', 255);
            $table->longText('descripcion');
            $table->string('url', 255);
            $table->bigInteger('tiempos')->default(0);
            $table->string('sigla', 3);
            $table->date('fecha_max_recurso')->nullable();
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
        Schema::dropIfExists('tipo_pqr');
    }
}
