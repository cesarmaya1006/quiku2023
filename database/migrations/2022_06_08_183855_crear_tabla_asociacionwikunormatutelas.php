<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsociacionwikunormatutelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociacionwikunormatutelas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('wikunormas_id');
            $table->foreign('wikunormas_id', 'fk_wikunormas_submotivotutelas')->references('id')->on('wikunormas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('submotivotutela_id');
            $table->foreign('submotivotutela_id', 'fk_submotivotutelas_wikunormas')->references('id')->on('submotivotutelas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('asociacionwikunormatutelas');
    }
}
