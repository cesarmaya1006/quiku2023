<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaConceptouopinionconsultashechos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptouopinionconsultashechos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('conceptouopinionconsultas_id');
            $table->foreign('conceptouopinionconsultas_id', 'fk_conceptouopinionconsultas_hechos')->references('id')->on('conceptouopinionconsultas')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('hecho');
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
        Schema::dropIfExists('conceptouopinionconsultashechos');
    }
}
