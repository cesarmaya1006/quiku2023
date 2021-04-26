<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Marcas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = [
            ['producto_id' => '1', 'marca' => 'ALCATEL'],
            ['producto_id' => '1', 'marca' => 'ASUS'],
            ['producto_id' => '1', 'marca' => 'CATERPILLAR'],
            ['producto_id' => '1', 'marca' => 'EPIK'],
            ['producto_id' => '1', 'marca' => 'GENERICO'],
            ['producto_id' => '1', 'marca' => 'GO-CEL'],
            ['producto_id' => '1', 'marca' => 'HUAWEI'],
            ['producto_id' => '1', 'marca' => 'HYUNDAI'],
            ['producto_id' => '1', 'marca' => 'INFINIX'],
            ['producto_id' => '1', 'marca' => 'ISWAK'],
            ['producto_id' => '1', 'marca' => 'KALLEY'],
            ['producto_id' => '1', 'marca' => 'KRONO'],
            ['producto_id' => '1', 'marca' => 'LG'],
            ['producto_id' => '1', 'marca' => 'MOTOROLA'],
            ['producto_id' => '1', 'marca' => 'MYMOBILE'],
            ['producto_id' => '1', 'marca' => 'NOKIA'],
            ['producto_id' => '1', 'marca' => 'ONONU'],
            ['producto_id' => '1', 'marca' => 'PANASONIC'],
            ['producto_id' => '1', 'marca' => 'REALME'],
            ['producto_id' => '1', 'marca' => 'SAMSUNG'],
            ['producto_id' => '1', 'marca' => 'SKY'],
            ['producto_id' => '1', 'marca' => 'TECNO'],
            ['producto_id' => '1', 'marca' => 'UNONU'],
            ['producto_id' => '1', 'marca' => 'VIVO'],
            ['producto_id' => '1', 'marca' => 'VTA'],
            ['producto_id' => '1', 'marca' => 'XIAOMI'],
            ['producto_id' => '2', 'marca' => 'APPLE'],
            ['producto_id' => '3', 'marca' => 'ALCATEL'],
            ['producto_id' => '3', 'marca' => 'AT&T'],
            ['producto_id' => '3', 'marca' => 'DANKI'],
            ['producto_id' => '3', 'marca' => 'KTS'],
            ['producto_id' => '3', 'marca' => 'MOTOROLA'],
            ['producto_id' => '3', 'marca' => 'NANOTEC'],
            ['producto_id' => '3', 'marca' => 'PANASONIC'],
            ['producto_id' => '3', 'marca' => 'VTECH'],
        ];
        foreach ($marcas as $key => $value) {
            DB::table('marcas')->insert([
                'producto_id' => $value['producto_id'],
                'marca' => $value['marca'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
