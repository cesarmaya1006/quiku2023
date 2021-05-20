<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_DiasFestivos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fechas = [
            ['fecha' => '2021-01-01'],
            ['fecha' => '2021-01-11'],
            ['fecha' => '2021-03-22'],
            ['fecha' => '2021-04-01'],
            ['fecha' => '2021-04-02'],
            ['fecha' => '2021-05-01'],
            ['fecha' => '2021-05-17'],
            ['fecha' => '2021-06-07'],
            ['fecha' => '2021-06-14'],
            ['fecha' => '2021-07-05'],
            ['fecha' => '2021-07-20'],
            ['fecha' => '2021-08-07'],
            ['fecha' => '2021-08-16'],
            ['fecha' => '2021-10-18'],
            ['fecha' => '2021-11-01'],
            ['fecha' => '2021-11-15'],
            ['fecha' => '2021-12-08'],
            ['fecha' => '2021-12-25'],
            ['fecha' => '2022-01-01'],
            ['fecha' => '2022-01-10'],
            ['fecha' => '2022-03-21'],
            ['fecha' => '2022-04-14'],
            ['fecha' => '2022-04-15'],
            ['fecha' => '2022-05-01'],
            ['fecha' => '2022-05-30'],
            ['fecha' => '2022-06-20'],
            ['fecha' => '2022-06-27'],
            ['fecha' => '2022-07-04'],
            ['fecha' => '2022-07-20'],
            ['fecha' => '2022-08-07'],
            ['fecha' => '2022-07-15'],
            ['fecha' => '2022-10-17'],
            ['fecha' => '2022-11-07'],
            ['fecha' => '2022-11-14'],
            ['fecha' => '2022-12-08'],
            ['fecha' => '2022-12-25']

        ];
        foreach ($fechas as $item) {
            DB::table('diasfestivos')->insert([
                'fecha' => $item['fecha'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
