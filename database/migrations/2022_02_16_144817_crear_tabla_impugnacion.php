<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaImpugnacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impugnacion', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('sentenciapinstancia_id');
            $table->foreign('sentenciapinstancia_id', 'fk_sentenciap_impugnacion')->references('id')->on('sentenciapinstancia')->onDelete('restrict')->onUpdate('restrict');
            $table->string('interpositor', 255)->nullable();
            $table->date('fecha')->nullable();
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
        Schema::dropIfExists('impugnacion');
    }
}
