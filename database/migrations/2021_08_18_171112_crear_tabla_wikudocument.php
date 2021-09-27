<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikudocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikudocument', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('fuente', 255);
            $table->string('numero', 255);
            $table->date('fecha');
            $table->string('emisor', 255);
            $table->string('archivo', 255)->nullable();
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
        Schema::dropIfExists('wikudocument');
    }
}
