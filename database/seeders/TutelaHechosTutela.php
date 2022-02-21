<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutelaHechosTutela extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hechos_tutela')->insert([
            'auto_admisorio_id' => '1',
            'empleado_id' => '6',
            'estado_id' => '1',
            'hecho' => 'Hecho 1',
            'consecutivo' => '1',
            'created_at' => '2022-02-20 23:23:49',
            'updated_at' => '2022-02-20 23:23:59',
        ]);
    }
}
