<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_WikuPalabras extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['palabra' => 'joven'],
            ['palabra' => 'antivalores'],
            ['palabra' => 'influencia'],
            ['palabra' => 'Revolución Francesa'],
            ['palabra' => 'Derechos del Hombre'],
            ['palabra' => 'cigarrillos'],
            ['palabra' => 'advertencias'],
        ];
        foreach ($tipos as $key => $value) {
            DB::table('wikupalabrasclave')->insert([
                'palabra' => $value['palabra'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
