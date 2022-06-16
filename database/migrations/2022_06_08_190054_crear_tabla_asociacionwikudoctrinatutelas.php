<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAsociacionwikudoctrinatutelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociacionwikudoctrinatutelas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('wikudoctrinas_id');
            $table->foreign('wikudoctrinas_id', 'fk_wikudoctrinas_submotivotutelas')->references('id')->on('wikudoctrinas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('submotivotutela_id');
            $table->foreign('submotivotutela_id', 'fk_submotivotutelas_wikudoctrinas')->references('id')->on('submotivotutelas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('asociacionwikudoctrinatutelas');
    }
}
