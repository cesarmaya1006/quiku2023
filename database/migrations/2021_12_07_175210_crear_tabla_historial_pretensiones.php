<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaHistorialPretensiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_pretensiones', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('auto_admisorio_id');
            $table->foreign('auto_admisorio_id', 'fk_auto_admisorio_historial_pretension')->references('id')->on('auto_admisorio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('pretensiones_tutela_id')->nullable();
            $table->foreign('pretensiones_tutela_id', 'pretensioneshos_tutela_historial')->references('id')->on('pretensiones_tutela')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_historial_pretensiones_tutela')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('historial')->nullable();
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
        Schema::dropIfExists('historial_pretensiones');
    }
}
