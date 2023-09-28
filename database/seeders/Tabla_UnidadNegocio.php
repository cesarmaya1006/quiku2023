<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_UnidadNegocio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidad_negocio')->insert([
            'empleado_id' => '5',
            'tipo_persona_id' => '2',
            'docutipos_id' => '6',
            'numero_documento' => '79888777',
            'nombres' => 'Bromelias',
            'apellidos' => '',
            'correo' => 'quiku2021@gmail.com',
            'direccion' => 'Calle 1 12-21',
            'telefono' => '0000000000',
            'created_at' => '2022-02-20 23:23:26',
            'updated_at' => '2022-02-20 23:23:26',
        ]);
    }
}
