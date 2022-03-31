<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_WikuAutores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['nombre1' => 'Carlos','apellido1' => 'Rodriguez']
        ];
        foreach ($tipos as $key => $value) {
            DB::table('wikuautores')->insert([
                'nombre1' => $value['nombre1'],
                'apellido1' => $value['apellido1'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
