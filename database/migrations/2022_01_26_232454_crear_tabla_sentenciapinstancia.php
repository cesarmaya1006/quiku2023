<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSentenciapinstancia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentenciapinstancia', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('auto_admisorio_id');
            $table->foreign('auto_admisorio_id', 'fk_auto_admisorio_sentenciap')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_sentencia');
            $table->timestamp('fecha_notificacion');
            $table->string('sentencia', 255);
            $table->string('url_sentencia', 255);
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
        Schema::dropIfExists('sentenciapinstancia');
    }
}
