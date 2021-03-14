<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Riesgo_Perdida extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $riesgo = [
            ['riesgo_perdida' => 'CIERTO '],
            ['riesgo_perdida' => 'PROBABLE'],
            ['riesgo_perdida' => 'REMOTO'],
            ['riesgo_perdida' => 'PENDIENTE'],

        ];
        foreach ($riesgo as $item) {
            DB::table('riesgo_perdida')->insert([
                'riesgo_perdida' => utf8_decode(utf8_encode($item['riesgo_perdida'])),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
