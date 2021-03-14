<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_DocuTipos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['abreb_id' => 'CC', 'tipo_id' => 'Cedula de ciudadania'],
            ['abreb_id' => 'CE', 'tipo_id' => 'Cedula de extranjeria'],
            ['abreb_id' => 'PA', 'tipo_id' => 'Pasaporte'],
            ['abreb_id' => 'RC', 'tipo_id' => 'Registro Civil'],
            ['abreb_id' => 'TI', 'tipo_id' => 'Tarjeta de identidad'],
            ['abreb_id' => 'NIT', 'tipo_id' => 'Num Identif  Tributaria'],
            ['abreb_id' => 'PEP', 'tipo_id' => 'Permiso Especial de Permanencia'],
            ['abreb_id' => 'TMF', 'tipo_id' => 'Tarjeta de Movilidad Fronteriza'],
        ];
        foreach ($tipos as $item) {
            DB::table('docutipos')->insert([
                'abreb_id' => $item['abreb_id'],
                'tipo_id' => $item['tipo_id'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
