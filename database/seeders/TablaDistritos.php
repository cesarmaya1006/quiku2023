<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaDistritos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['departamento_id' => 5, 'distrito' => 'ALTA CORTE CS'],
            ['departamento_id' => 2, 'distrito' => 'ANTIOQUIA'],
            ['departamento_id' => 3, 'distrito' => 'ARAUCA'],
            ['departamento_id' => 25, 'distrito' => 'ARMENIA'],
            ['departamento_id' => 4, 'distrito' => 'ATLÁNTICO'],
            ['departamento_id' => 4, 'distrito' => 'BARRANQUILLA'],
            ['departamento_id' => 5, 'distrito' => 'BOGOTÁ'],
            ['departamento_id' => 6, 'distrito' => 'BOLÍVAR'],
            ['departamento_id' => 7, 'distrito' => 'BOYACÁ'],
            ['departamento_id' => 23, 'distrito' => 'BUCARAMANGA'],
            ['departamento_id' => 13, 'distrito' => 'BUGA'],
            ['departamento_id' => 8, 'distrito' => 'CALDAS'],
            ['departamento_id' => 31, 'distrito' => 'CALI'],
            ['departamento_id' => 9, 'distrito' => 'CAQUETÁ'],
            ['departamento_id' => 6, 'distrito' => 'CARTAGENA'],
            ['departamento_id' => 10, 'distrito' => 'CASANARE'],
            ['departamento_id' => 11, 'distrito' => 'CAUCA'],
            ['departamento_id' => 11, 'distrito' => 'CAUCA '],
            ['departamento_id' => 12, 'distrito' => 'CESAR'],
            ['departamento_id' => 13, 'distrito' => 'CHOCÓ'],
            ['departamento_id' => 5, 'distrito' => 'CONSEJO DE ESTADO'],
            ['departamento_id' => 14, 'distrito' => 'CÓRDOBA'],
            ['departamento_id' => 5, 'distrito' => 'CORTE CONSTITUCIONAL'],
            ['departamento_id' => 5, 'distrito' => 'CORTE SUPREMA DE JUSTICIA'],
            ['departamento_id' => 12, 'distrito' => 'CÚCUTA'],
            ['departamento_id' => 5, 'distrito' => 'CUNDINAMARCA'],
            ['departamento_id' => 9, 'distrito' => 'FLORENCIA'],
            ['departamento_id' => 19, 'distrito' => 'GUAJIRA'],
            ['departamento_id' => 18, 'distrito' => 'HUILA'],
            ['departamento_id' => 15, 'distrito' => 'IBAGUÉ'],
            ['departamento_id' => 19, 'distrito' => 'LA GUAJIRA'],
            ['departamento_id' => 20, 'distrito' => 'MAGDALENA'],
            ['departamento_id' => 7, 'distrito' => 'MANIZALES'],
            ['departamento_id' => 2, 'distrito' => 'MEDELLÍN'],
            ['departamento_id' => 21, 'distrito' => 'META'],
            ['departamento_id' => 11, 'distrito' => 'MOCOA'],
            ['departamento_id' => 14, 'distrito' => 'MONTERÍA'],
            ['departamento_id' => 22, 'distrito' => 'NARIÑO'],
            ['departamento_id' => 18, 'distrito' => 'NEIVA'],
            ['departamento_id' => 23, 'distrito' => 'NORTE DE SANTANDER'],
            ['departamento_id' => 23, 'distrito' => 'PAMPLONA'],
            ['departamento_id' => 22, 'distrito' => 'PASTO'],
            ['departamento_id' => 26, 'distrito' => 'PEREIRA'],
            ['departamento_id' => 11, 'distrito' => 'POPAYÁN'],
            ['departamento_id' => 13, 'distrito' => 'QUIBDÓ'],
            ['departamento_id' => 25, 'distrito' => 'QUINDÍO'],
            ['departamento_id' => 19, 'distrito' => 'RIOHACHA'],
            ['departamento_id' => 26, 'distrito' => 'RISARALDA'],
            ['departamento_id' => 27, 'distrito' => 'SAN ANDRÉS'],
            ['departamento_id' => 28, 'distrito' => 'SAN GIL'],
            ['departamento_id' => 20, 'distrito' => 'SANTA MARTA'],
            ['departamento_id' => 7, 'distrito' => 'SANTA ROSA DE VITERBO'],
            ['departamento_id' => 28, 'distrito' => 'SANTANDER'],
            ['departamento_id' => 29, 'distrito' => 'SINCELEJO'],
            ['departamento_id' => 29, 'distrito' => 'SUCRE'],
            ['departamento_id' => 30, 'distrito' => 'TOLIMA'],
            ['departamento_id' => 7, 'distrito' => 'TUNJA'],
            ['departamento_id' => 31, 'distrito' => 'VALLE DEL CAUCA'],
            ['departamento_id' => 12, 'distrito' => 'VALLEDUPAR'],
            ['departamento_id' => 15, 'distrito' => 'VILLAVICENCIO'],
            ['departamento_id' => 7, 'distrito' => 'YOPAL']
        ];
        foreach ($areas as $item) {
            DB::table('distritos')->insert([
                'departamento_id' => $item['departamento_id'],
                'distrito' => $item['distrito'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
