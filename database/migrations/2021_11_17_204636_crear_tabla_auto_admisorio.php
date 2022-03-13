<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAutoAdmisorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_admisorio', function (Blueprint $table) {
            // Bloque informativo usuario
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('unidad_negocio_id')->nullable();
            $table->foreign('unidad_negocio_id', 'fk_unidad_negocio_tutela')->references('id')->on('unidad_negocio')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_rigistro_id')->nullable();
            $table->foreign('empleado_rigistro_id', 'fk_empleado_registro_tutela')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_asignado_id')->nullable();
            $table->foreign('empleado_asignado_id', 'fk_empleado_asignado_tutela')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('prioridad_id')->default(2)->nullable();
            $table->foreign('prioridad_id', 'fk_prioridades_tutelas')->references('id')->on('prioridades')->onDelete('restrict')->onUpdate('restrict');
            $table->dateTime('fecha_radicado')->nullable();
            // Primer Bloque
            $table->text('radicado', 255)->nullable();
            $table->text('jurisdiccion', 255)->nullable();
            $table->text('juzgado', 255)->nullable();
            $table->string('departamento', 255)->nullable();
            $table->string('municipio', 255)->nullable();
            $table->timestamp('fecha_notificacion')->nullable();
            // Segundo Bloque
            $table->string('nombre_juez', 255)->nullable();
            $table->string('direccion_juez', 255)->nullable();
            $table->string('telefono_juez', 20)->nullable();
            $table->string('correo_juez', 100)->nullable();
            // Tercer Bloque
            $table->bigInteger('dias_termino')->default(0)->nullable();
            $table->bigInteger('horas_termino')->default(0)->nullable();
            $table->string('titulo_admisorio', 255)->nullable();
            $table->longText('descripcion_admisorio')->nullable();
            $table->string('url_admisorio', 255)->nullable();
            $table->string('extension_admisorio', 255)->nullable();
            $table->double('peso_admisorio')->nullable();
            $table->string('medida_cautelar', 20)->default(0)->nullable();
            $table->text('text_medida_cautelar')->nullable();
            $table->bigInteger('dias_medida_cautelar')->default(0)->nullable();
            $table->bigInteger('horas_medida_cautelar')->default(0)->nullable();
            //Bloque tutela    
            $table->string('titulo_tutela', 255)->nullable();
            $table->longText('descripcion_tutela')->nullable();
            $table->string('url_tutela', 255)->nullable();
            $table->string('extension_tutela', 255)->nullable();
            $table->double('peso_tutela')->nullable();
            //Bloque estados    
            $table->dateTime('fecha_limite')->nullable();
            $table->unsignedBigInteger('estadostutela_id')->nullable();
            $table->foreign('estadostutela_id', 'fk_estados_tutela')->references('id')->on('estadostutela')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('estado_asignacion')->default(0)->nullable();
            $table->boolean('cantidad_hechos')->default(0)->nullable();
            $table->boolean('cantidad_pretensiones')->default(0)->nullable();
            $table->boolean('estado_creacion')->default(0)->nullable();
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
        Schema::dropIfExists('auto_admisorio');
    }
}
