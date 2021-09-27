<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_WikuTemasEspecificos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['tema_id' => '1', 'tema' => 'Tema Especifico 1 - 1'],
            ['tema_id' => '1', 'tema' => 'Tema Especifico 1 - 2'],
            ['tema_id' => '1', 'tema' => 'Tema Especifico 1 - 3'],
            ['tema_id' => '2', 'tema' => 'Tema Especifico 2 - 1'],
            ['tema_id' => '2', 'tema' => 'Tema Especifico 2 - 2'],
            ['tema_id' => '2', 'tema' => 'Tema Especifico 2 - 3'],
            ['tema_id' => '3', 'tema' => 'Tema Especifico 3 - 1'],
            ['tema_id' => '3', 'tema' => 'Tema Especifico 3 - 2'],
            ['tema_id' => '3', 'tema' => 'Tema Especifico 3 - 3'],
            ['tema_id' => '4', 'tema' => 'Tema Especifico 4 - 1'],
            ['tema_id' => '4', 'tema' => 'Tema Especifico 4 - 2'],
            ['tema_id' => '4', 'tema' => 'Tema Especifico 4 - 3'],
            ['tema_id' => '5', 'tema' => 'Tema Especifico 5 - 1'],
            ['tema_id' => '5', 'tema' => 'Tema Especifico 5 - 2'],
            ['tema_id' => '5', 'tema' => 'Tema Especifico 5 - 3'],
            ['tema_id' => '6', 'tema' => 'Tema Especifico 6 - 1'],
            ['tema_id' => '6', 'tema' => 'Tema Especifico 6 - 2'],
            ['tema_id' => '6', 'tema' => 'Tema Especifico 6 - 3'],
            ['tema_id' => '7', 'tema' => 'Tema Especifico 7 - 1'],
            ['tema_id' => '7', 'tema' => 'Tema Especifico 7 - 2'],
            ['tema_id' => '7', 'tema' => 'Tema Especifico 7 - 3'],
            ['tema_id' => '8', 'tema' => 'Tema Especifico 8 - 1'],
            ['tema_id' => '8', 'tema' => 'Tema Especifico 8 - 2'],
            ['tema_id' => '8', 'tema' => 'Tema Especifico 8 - 3'],
            ['tema_id' => '9', 'tema' => 'Tema Especifico 9 - 1'],
            ['tema_id' => '9', 'tema' => 'Tema Especifico 9 - 2'],
            ['tema_id' => '9', 'tema' => 'Tema Especifico 9 - 3'],
            ['tema_id' => '10', 'tema' => 'Tema Especifico 10 - 1'],
            ['tema_id' => '10', 'tema' => 'Tema Especifico 10 - 2'],
            ['tema_id' => '10', 'tema' => 'Tema Especifico 10 - 3'],
            ['tema_id' => '11', 'tema' => 'Tema Especifico 11 - 1'],
            ['tema_id' => '11', 'tema' => 'Tema Especifico 11 - 2'],
            ['tema_id' => '11', 'tema' => 'Tema Especifico 11 - 3'],
            ['tema_id' => '12', 'tema' => 'Tema Especifico 12 - 1'],
            ['tema_id' => '12', 'tema' => 'Tema Especifico 12 - 2'],
            ['tema_id' => '12', 'tema' => 'Tema Especifico 12 - 3'],
            ['tema_id' => '13', 'tema' => 'Tema Especifico 13 - 1'],
            ['tema_id' => '13', 'tema' => 'Tema Especifico 13 - 2'],
            ['tema_id' => '13', 'tema' => 'Tema Especifico 13 - 3'],
            ['tema_id' => '14', 'tema' => 'Tema Especifico 14 - 1'],
            ['tema_id' => '14', 'tema' => 'Tema Especifico 14 - 2'],
            ['tema_id' => '14', 'tema' => 'Tema Especifico 14 - 3'],
            ['tema_id' => '15', 'tema' => 'Tema Especifico 15 - 1'],
            ['tema_id' => '15', 'tema' => 'Tema Especifico 15 - 2'],
            ['tema_id' => '15', 'tema' => 'Tema Especifico 15 - 3'],
        ];
        foreach ($tipos as $key => $value) {
            DB::table('wikutemaespecifico')->insert([
                'tema_id' => $value['tema_id'],
                'tema' => $value['tema'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
