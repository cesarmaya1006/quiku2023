<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Proyectos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyectos')->insert([
            'titulo' => 'PROYECTO DE PRUEBA 1',
            'fec_creacion' => '2021-03-06',
            'objetivo' => 'Objetivo de prueba  para proyecto 1',
            'empresa_id' => 1,
            'lider_id' => 9,
            'estado' => 'Nuevo',
            'progreso' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
