<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrimeraInstanciaResuelve extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['sentenciapinstancia_id' => '1', 'sentido' => 'Desfavorable', 'numeracion' => '1', 'dias' => '15', 'horas' => '0'],
            ['sentenciapinstancia_id' => '1', 'sentido' => 'Favorable', 'numeracion' => '2', 'dias' => '0', 'horas' => '0'],
            ['sentenciapinstancia_id' => '1', 'sentido' => 'Desfavorable', 'numeracion' => '3', 'dias' => '15', 'horas' => '0'],

        ];
        foreach ($tipos as $key => $value) {
            DB::table('resuelvesentencia')->insert([
                'sentenciapinstancia_id' => $value['sentenciapinstancia_id'],
                'sentido' => $value['sentido'],
                'numeracion' => $value['numeracion'],
                'dias' => $value['dias'],
                'horas' => $value['horas'],
                'created_at' => '2022-02-20 22:03:14',
                'updated_at' => '2022-02-20 22:03:14',
            ]);
        }
    }
}
