<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutelaArgumentosTutela extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('argumentos_tutela')->insert([
            'auto_admisorio_id' => '1',
            'argumento' => 'Argumento 1',
            'created_at' => '2022-02-20 18:23:50',
            'updated_at' => '2022-02-20 18:23:50',
        ]);
    }
}
