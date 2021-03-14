<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_HvArea extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hv_area')->insert([
            'nivel_id' => 1,
            'area' => 'Contabilidad',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_area')->insert([
            'nivel_id' => 1,
            'area' => 'Sistemas',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_area')->insert([
            'nivel_id' => 1,
            'area' => 'Talento Humano',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_area')->insert([
            'nivel_id' => 1,
            'area' => 'Juridica',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_area')->insert([
            'nivel_id' => 2,
            'area' => 'Sistemas',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_area')->insert([
            'nivel_id' => 2,
            'area' => 'Servicios Generales',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
