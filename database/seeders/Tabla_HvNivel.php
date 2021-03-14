<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_HvNivel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hv_nivel')->insert([
            'empresa_id' => 1,
            'nivel' => 'Administrativo',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('hv_nivel')->insert([
            'empresa_id' => 1,
            'nivel' => 'Operativo',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
