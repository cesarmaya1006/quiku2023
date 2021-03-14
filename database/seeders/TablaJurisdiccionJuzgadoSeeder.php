<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaJurisdiccionJuzgadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['jurisdiccion' => 'CONSTITUCIONAL'],
            ['jurisdiccion' => 'LABORAL'],
            ['jurisdiccion' => 'CIVIL Y COMERCIAL'],
            ['jurisdiccion' => 'FAMILIA'],
            ['jurisdiccion' => 'PENAL'],
            ['jurisdiccion' => 'CONTENCIOSO ADMINISTRATIVO'],
            ['jurisdiccion' => 'ORDINARIO PROMISCUO'],
            ['jurisdiccion' => 'FUNCIÓN JURISDICCIONAL DE ADMINISTRACIÓN'],
            ['jurisdiccion' => 'CIVIL FAMILIA'],
            ['jurisdiccion' => 'PROMISCUO DE FAMILIA'],
            ['jurisdiccion' => 'OTRO'],

        ];
        foreach ($areas as $item) {
            DB::table('jurisdiccion_juzgado')->insert([
                'jurisdiccion' => utf8_encode($item['jurisdiccion']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
