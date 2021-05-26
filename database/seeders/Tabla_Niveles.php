<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Niveles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles = [
            ['area_id' => '1', 'nivel' => 'Coordinador de pqr'],


        ];
        foreach ($niveles as $key => $value) {
            DB::table('niveles')->insert([
                'area_id' => $value['area_id'],
                'nivel' => $value['nivel'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
