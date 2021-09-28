<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikuargcriterios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikuargcriterios', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('argumento_id');
            $table->foreign('argumento_id', 'fk_argumento_criterio')->references('id')->on('wikuargumentos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('autores', 255);
            $table->longText('criterio_si')->nullable();
            $table->longText('criterio_no')->nullable();
            $table->longText('notas')->nullable();
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
        Schema::dropIfExists('wikuargcriterios');
    }
}
