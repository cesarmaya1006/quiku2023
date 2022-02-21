<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutelaHistorialPrimeraAsignacionTutela extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('historial_primera_asignacion_tutela')->insert([
            'auto_admisorio_id' => '1',
            'empleado_id' => '6',
            'historial' => 'Aceptada por el funcionario',
            'created_at' => '2022-02-20 18:23:59',
            'updated_at' => '2022-02-20 18:23:59',
        ]);
    }
}
