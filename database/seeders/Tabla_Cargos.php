<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Cargos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $niveles = [
            ['nivel_id' => '1', 'cargo' => 'Asignador PQR'],
            ['nivel_id' => '1', 'cargo' => 'Funcionario 1'],
            ['nivel_id' => '1', 'cargo' => 'Funcionario 2'],
            ['nivel_id' => '1', 'cargo' => 'Funcionario 3'],


        ];
        foreach ($niveles as $key => $value) {
            DB::table('cargos')->insert([
                'nivel_id' => $value['nivel_id'],
                'cargo' => $value['cargo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
