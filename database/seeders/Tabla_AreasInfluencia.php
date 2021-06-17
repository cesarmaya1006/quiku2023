<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_AreasInfluencia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 33; $i++) {
            DB::table('area_influencia')->insert([
                'sede_id' => '1',
                'departamento_id' => $i,
            ]);
        }
    }
}
