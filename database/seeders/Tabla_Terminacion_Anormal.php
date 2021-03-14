<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Terminacion_Anormal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $terminacion_anormal = [
            ['terminacion_anormal' => 'CONCILIACIÓN '],
            ['terminacion_anormal' => 'DESISTIMIENTO '],
            ['terminacion_anormal' => 'OTRO'],



        ];
        foreach ($terminacion_anormal as $item) {
            DB::table('terminacion_anormal')->insert([
                'terminacion_anormal' => utf8_decode(utf8_encode($item['terminacion_anormal'])),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
