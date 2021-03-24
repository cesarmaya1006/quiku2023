<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Parametros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametros')->insert([
            'logo' => '1616023696logo2.png',
            'bg_titulo' => '#F24949',
            'color_titulo' => '#FFFFFF',
            'titulo' => 'SISTEMA DE REGISTRO DE PETICIONES, QUEJAS Y RECLAMOS',
            'bg_caja' => '#F2D8D8',
            'bg_botones' => '#6D53A6',
            'color_botones' => '#FFFFFF',
            'color_titulos' => '#6D53A6',
            'color_texto' => '#6D53A6',
            'fondo1' => '#20C997',
            'fondo2' => '#0D6EFD',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
