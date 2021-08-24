<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikucriteriosNormas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikucriterios_normas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('normacriterio_id');
            $table->foreign('normacriterio_id', 'fk_norma_criterio')->references('id')->on('wikunormas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('criterionorma_id');
            $table->foreign('criterionorma_id', 'fk_criterio_norma_id')->references('id')->on('wikucriterios')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('wikucriterios_normas');
    }
}
