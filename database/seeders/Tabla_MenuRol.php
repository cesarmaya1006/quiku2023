<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_MenuRol extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 8; $i++) {
            DB::table('menu_rol')->insert([
                'rol_id' => '1',
                'menu_id' => $i,
            ]);
        }
    }
}
