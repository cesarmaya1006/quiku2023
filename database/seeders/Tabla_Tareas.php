<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Tareas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['tarea' => 'SUPERVIZA'],
            ['tarea' => 'PROYECTA'],
            ['tarea' => 'REVISA'],
            ['tarea' => 'APRUEBA'],
            ['tarea' => 'RADICA']
        ];
        foreach ($tipos as $key => $value) {
            DB::table('tareas')->insert([
                'tarea' => $value['tarea'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
