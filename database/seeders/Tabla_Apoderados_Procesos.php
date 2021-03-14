<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Apoderados_Procesos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apoderados_proc = [
            ['procesos_id' => '1', 'apoderado_id' => '2'],
            ['procesos_id' => '2', 'apoderado_id' => '3'],
            ['procesos_id' => '3', 'apoderado_id' => '4'],
            ['procesos_id' => '4', 'apoderado_id' => '5'],

        ];
        foreach ($apoderados_proc as $item) {
            DB::table('apoderados_proceso')->insert([
                'procesos_id' => $item['procesos_id'],
                'apoderado_id' => $item['apoderado_id'],
            ]);
        }
    }
}
