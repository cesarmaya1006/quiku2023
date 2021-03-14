<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearPublicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacion', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'fk_empleado_publicacion')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('titulo', 255);
            $table->string('isbn', 255)->nullable();
            $table->string('pagina_legal', 255)->nullable();
            $table->string('autores', 255);
            $table->string('revista', 255);
            $table->string('base_datos', 255)->nullable();
            $table->string('cuartil', 255);
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
        Schema::dropIfExists('publicacion');
    }
}
