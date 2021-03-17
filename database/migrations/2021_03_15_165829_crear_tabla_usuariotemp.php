<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuariotemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariotemp', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('tipo_persona', 255);
            $table->unsignedBigInteger('docutipos_id');
            $table->foreign('docutipos_id', 'fk_usuariotemp_docutipos')->references('id')->on('docutipos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('identificacion', 100)->unique();
            $table->string('email', 255)->unique();
            $table->integer('estado')->default(0);
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
        Schema::dropIfExists('usuariotemp');
    }
}
