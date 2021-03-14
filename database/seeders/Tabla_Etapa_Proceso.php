<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Etapa_Proceso extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $etapa = [
            ['etapa_proceso' => 'PRESENTACIÓN DE LA DEMANDA '],
            ['etapa_proceso' => 'CONTESTACIÓN DE LA DEMANDA'],
            ['etapa_proceso' => 'AUDIENCIA ÚNICA INSTANCIA'],
            ['etapa_proceso' => 'INTEGRACIÓN DEL CONTRADICTORIO'],
            ['etapa_proceso' => 'AUDIENCIA INICIAL '],
            ['etapa_proceso' => 'AUDIENCIA PRUEBAS Y JUZGAMIENTO'],
            ['etapa_proceso' => 'APELACIÓN FALLO'],
            ['etapa_proceso' => 'AUDIENCIA SEGUNDA INSTANCIA '],
            ['etapa_proceso' => 'INCIDENTE DE NULIDAD '],
            ['etapa_proceso' => 'CASACIÓN '],
            ['etapa_proceso' => 'ANULACIÓN LAUDO'],
            ['etapa_proceso' => 'OTRO'],

        ];
        foreach ($etapa as $item) {
            DB::table('etapa_proceso')->insert([
                'etapa_proceso' => utf8_decode(utf8_encode($item['etapa_proceso'])),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
