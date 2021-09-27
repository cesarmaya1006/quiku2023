<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_WikuFuente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['fuente' => 'Fuente 1', 'numero' => '1', 'fecha' => '1', 'emisor' => 'Emisor 1'],
            ['fuente' => 'Fuente 2', 'numero' => '2', 'fecha' => '2', 'emisor' => 'Emisor 2'],
            ['fuente' => 'Fuente 3', 'numero' => '3', 'fecha' => '3', 'emisor' => 'Emisor 3'],
            ['fuente' => 'Fuente 4', 'numero' => '4', 'fecha' => '4', 'emisor' => 'Emisor 4'],
            ['fuente' => 'Fuente 5', 'numero' => '5', 'fecha' => '5', 'emisor' => 'Emisor 5']
        ];
        foreach ($tipos as $key => $value) {
            DB::table('wikudocument')->insert([
                'fuente' => $value['fuente'],
                'numero' => $value['numero'],
                'fecha' => Carbon::now()->format('Y-m-d'),
                'emisor' => $value['emisor'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
