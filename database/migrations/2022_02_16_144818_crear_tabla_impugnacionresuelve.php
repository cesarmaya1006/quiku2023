<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaImpugnacionresuelve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impugnacionresuelve', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('impugnacion_id');
            $table->foreign('impugnacion_id', 'fk_impugnacion_impugnacionresuelve')->references('id')->on('impugnacion')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('impugnacionresuelve_estado_id');
            $table->foreign('impugnacionresuelve_estado_id', 'fk_impugnacionresuelve_estado_impugnacionresuelve')->references('id')->on('impugnacionresuelve_estado')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_impugnacionresuelve')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('resuelve')->nullable();
            $table->string('url_impugnacion', 255)->nullable();
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
        Schema::dropIfExists('impugnacionresuelve');
    }
}
