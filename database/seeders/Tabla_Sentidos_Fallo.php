<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Sentidos_Fallo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sentido_fallo = [
            ['sentido_fallo' => 'A FAVOR'],
            ['sentido_fallo' => 'EN CONTRA'],


        ];
        foreach ($sentido_fallo as $item) {
            DB::table('sentidos_fallo')->insert([
                'sentido_fallo' => utf8_decode(utf8_encode($item['sentido_fallo'])),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
