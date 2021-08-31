<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikucriterios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikucriterios', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('norma_id');
            $table->foreign('norma_id', 'fk_norma_criterio')->references('id')->on('wikunormas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('wikucriterios');
    }
}
