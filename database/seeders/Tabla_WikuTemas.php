<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_WikuTemas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['area_id' => '1', 'tema' => 'Tema 1 - 1'],
            ['area_id' => '1', 'tema' => 'Tema 1 - 2'],
            ['area_id' => '1', 'tema' => 'Tema 1 - 3'],
            ['area_id' => '2', 'tema' => 'Tema 2 - 1'],
            ['area_id' => '2', 'tema' => 'Tema 2 - 2'],
            ['area_id' => '2', 'tema' => 'Tema 2 - 3'],
            ['area_id' => '3', 'tema' => 'Tema 3 - 1'],
            ['area_id' => '3', 'tema' => 'Tema 3 - 2'],
            ['area_id' => '3', 'tema' => 'Tema 3 - 3'],
            ['area_id' => '4', 'tema' => 'Tema 4 - 1'],
            ['area_id' => '4', 'tema' => 'Tema 4 - 2'],
            ['area_id' => '4', 'tema' => 'Tema 4 - 3'],
            ['area_id' => '5', 'tema' => 'Tema 5 - 1'],
            ['area_id' => '5', 'tema' => 'Tema 5 - 2'],
            ['area_id' => '5', 'tema' => 'Tema 5 - 3'],

        ];
        foreach ($tipos as $key => $value) {
            DB::table('wikutemas')->insert([
                'area_id' => $value['area_id'],
                'tema' => $value['tema'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
