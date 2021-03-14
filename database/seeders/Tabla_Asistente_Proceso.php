<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Asistente_Proceso extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apoderados_proc = [
            ['procesos_id' => '1', 'asistente_id' => '7'],
            ['procesos_id' => '2', 'asistente_id' => '7'],
            ['procesos_id' => '3', 'asistente_id' => '8'],
            ['procesos_id' => '4', 'asistente_id' => '8'],

        ];
        foreach ($apoderados_proc as $item) {
            DB::table('asistente_proceso')->insert([
                'procesos_id' => $item['procesos_id'],
                'asistente_id' => $item['asistente_id'],
            ]);
        }
    }
}
