<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaWikudoccriterios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikudoccriterios', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('doctrina_id');
            $table->foreign('doctrina_id', 'fk_doctrina_criterio')->references('id')->on('wikudoctrinas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('wikudoccriterios');
    }
}
