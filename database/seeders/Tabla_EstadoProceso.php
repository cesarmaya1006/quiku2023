<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_EstadoProceso extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $papel = [
            ['estado_proceso' => 'ACTIVO'],
            ['estado_proceso' => 'ARCHIVADO'],
            ['estado_proceso' => 'TERMINADO '],
            ['estado_proceso' => 'TERMINADO, SE DESVINCULA'],


        ];
        foreach ($papel as $item) {
            DB::table('estado_proceso')->insert([
                'estado_proceso' => utf8_decode(utf8_encode($item['estado_proceso'])),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
