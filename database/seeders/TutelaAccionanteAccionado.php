<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutelaAccionanteAccionado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accionante_accionado')->insert([
            'auto_admisorio_id' => '1',
            'tipo_accion_id' => '1',
            'tipo_persona_id' => '1',
            'docutipos_id_accion' => '1',
            'numero_documento_accion' => '79888777',
            'nombres_accion' => 'Jorge',
            'apellidos_accion' => 'Rodriguez',
            'correo_accion' => 'jorge@gmail.com',
            'direccion_accion' => 'Calle 1 12-21',
            'telefono_accion' => '3216548787',
            'nombre_apoderado' => 'Maria Jimenez',
            'docutipos_id_apoderado' => '1',
            'numero_documento_apoderado' => '529876565',
            'tarjeta_profesional_apoderado' => 'TP654987',
            'correo_apoderado' => 'mariaqgmail.com',
            'direccion_apoderado' => 'Calle 1 2-21',
            'telefono_apoderado' => '3116549898',
            'created_at' => '2022-02-20 23:23:26',
            'updated_at' => '2022-02-20 23:23:26',
        ]);
    }
}
