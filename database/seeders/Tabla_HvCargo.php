<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_HvCargo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hv_cargo')->insert([
            'area_id' => 1,
            'cargo' => 'Contador',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 1,
            'cargo' => 'Auxiliar de contabilidad',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 1,
            'cargo' => 'Analista Contable',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 2,
            'cargo' => 'Jefe de Sistemas',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 2,
            'cargo' => 'Desarrollador Master',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 2,
            'cargo' => 'Desarrollador Junior',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 3,
            'cargo' => 'Jefe de talento Humano',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 3,
            'cargo' => 'Psicólogo',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 4,
            'cargo' => 'Apoderado',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 4,
            'cargo' => 'Asistente',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 5,
            'cargo' => 'Técnico',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_cargo')->insert([
            'area_id' => 6,
            'cargo' => 'Auxiliar',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
