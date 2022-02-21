<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutelaAsignancionTareasTutela extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['auto_admisorio_id' => '1', 'empleado_id' => '6', 'estado_id' => '1', 'tareas_id' => '1'],
            ['auto_admisorio_id' => '1', 'empleado_id' => '6', 'estado_id' => '1', 'tareas_id' => '2'],
            ['auto_admisorio_id' => '1', 'empleado_id' => '6', 'estado_id' => '1', 'tareas_id' => '3'],
            ['auto_admisorio_id' => '1', 'empleado_id' => '6', 'estado_id' => '1', 'tareas_id' => '4'],
            ['auto_admisorio_id' => '1', 'empleado_id' => '6', 'estado_id' => '1', 'tareas_id' => '5'],

        ];
        foreach ($tipos as $key => $value) {
            DB::table('asignancion_tareas_tutela')->insert([
                'auto_admisorio_id' => $value['auto_admisorio_id'],
                'empleado_id' => $value['empleado_id'],
                'estado_id' => $value['estado_id'],
                'tareas_id' => $value['tareas_id'],
                'created_at' => '2022-02-20 18:23:59',
                'updated_at' => '2022-02-20 18:23:59',
            ]);
        }
    }
}
