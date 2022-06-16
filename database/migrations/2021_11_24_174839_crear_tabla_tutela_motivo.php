<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTutelaMotivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutela_motivo', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('auto_admisorio_id');
            $table->foreign('auto_admisorio_id', 'fk_auto_admisorio_tutela')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('motivotutela_id');
            $table->foreign('motivotutela_id', 'fk_motivotutela')->references('id')->on('motivotutelas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('submotivotutela_id');
            $table->foreign('submotivotutela_id', 'fk_submotivotutelas')->references('id')->on('submotivotutelas')->onDelete('restrict')->onUpdate('restrict');
            $table->string('tipo_tutela', 255)->nullable();
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
        Schema::dropIfExists('tutela_motivo');
    }
}
