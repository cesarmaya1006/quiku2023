<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_WikuAreas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['area' => 'Area 1'],
            ['area' => 'Area 2'],
            ['area' => 'Area 3'],
            ['area' => 'Area 4'],
            ['area' => 'Area 5']
        ];
        foreach ($tipos as $key => $value) {
            DB::table('wikuareas')->insert([
                'area' => $value['area'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
