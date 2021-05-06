<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Servicios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert([
            'servicio' => 'Servicio 1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicios')->insert([
            'servicio' => 'Servicio 2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('servicios')->insert([
            'servicio' => 'Servicio 3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
