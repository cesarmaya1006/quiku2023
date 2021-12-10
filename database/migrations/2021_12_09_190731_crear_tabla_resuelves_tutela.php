<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaResuelvesTutela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resuelves_tutela', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('auto_admisorio_id');
            $table->foreign('auto_admisorio_id', 'fk_auto_admisorio_resuelve')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_resuelve_tutela')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('orden')->nullable();
            $table->foreign('orden', 'fk_ordinal_resuelve_tutela')->references('id')->on('numeracionordinal')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('resuelve')->nullable();
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
        Schema::dropIfExists('resuelves_tutela');
    }
}
