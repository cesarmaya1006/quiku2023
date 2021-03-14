<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_papel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $papel = [
            ['papel' => 'DEMANDANTE'],
            ['papel' => 'DEMANDADO'],
            ['papel' => 'LISTIS CONSORTE FACULTATIVO '],
            ['papel' => 'LITIS CONSORTE NECESARIO'],
            ['papel' => 'LISTIS CONSORTE CUASINECESARIO'],
            ['papel' => 'INTERVENCIÓN EXCLUYENTE'],
            ['papel' => 'LLAMAMIENTO EN GARANTIA '],

        ];
        foreach ($papel as $item) {
            DB::table('papel')->insert([
                'papel' => utf8_decode(utf8_encode($item['papel'])),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
