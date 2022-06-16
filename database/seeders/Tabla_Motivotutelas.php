<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Motivotutelas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivos = [
            ['motivo' => 'Motivo 1'],
            ['motivo' => 'Motivo 2'],
            ['motivo' => 'Motivo 3'],
            ['motivo' => 'Motivo 4'],
            ['motivo' => 'Motivo 5'],
            ['motivo' => 'Motivo 6'],
            ['motivo' => 'Motivo 7'],
            ['motivo' => 'Motivo 8'],
            ['motivo' => 'Motivo 9'],

        ];
        foreach ($motivos as $key => $value) {
            DB::table('motivotutelas')->insert([
                'motivo' => $value['motivo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
