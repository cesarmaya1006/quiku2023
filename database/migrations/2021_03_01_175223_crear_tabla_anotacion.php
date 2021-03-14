<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAnotacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anotacion', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('procesos_id');
            $table->foreign('procesos_id', 'fk_anotacion_procesos')->references('id')->on('procesos')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha');
            $table->string('usuario', 255);
            $table->longText('nota');
            $table->string('tipo_documento', 255)->nullable();
            $table->string('nombre_doc', 255)->nullable();
            $table->string('url_doc', 255)->nullable();
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
        Schema::dropIfExists('anotacion');
    }
}
