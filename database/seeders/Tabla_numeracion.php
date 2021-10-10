<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_numeracion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numeros = [
            ['ordinal' => 'primero'],
            ['ordinal' => 'segundo'],
            ['ordinal' => 'tercero'],
            ['ordinal' => 'cuarto'],
            ['ordinal' => 'quinto'],
            ['ordinal' => 'sexto'],
            ['ordinal' => 'séptimo'],
            ['ordinal' => 'octavo'],
            ['ordinal' => 'noveno'],
            ['ordinal' => 'décimo'],
            ['ordinal' => 'undécimo'],
            ['ordinal' => 'duodécimo'],
            ['ordinal' => 'decimotercero'],
            ['ordinal' => 'decimocuarto'],
            ['ordinal' => 'decimoquinto'],
            ['ordinal' => 'decimosexto'],
            ['ordinal' => 'decimoséptimo'],
            ['ordinal' => 'decimoctavo'],
            ['ordinal' => 'decimonono'],
            ['ordinal' => 'vigésimo'],
            ['ordinal' => 'vigésimo primero'],
            ['ordinal' => 'vigésimo segundo'],
            ['ordinal' => 'vigésimo tercero'],
            ['ordinal' => 'vigésimo cuarto'],
            ['ordinal' => 'vigésimo quinto'],
            ['ordinal' => 'vigésimo sexto'],
            ['ordinal' => 'vigésimo séptimo'],
            ['ordinal' => 'vigésimo octavo'],
            ['ordinal' => 'vigésimo noveno'],
            ['ordinal' => 'trigésimo'],
        ];
        foreach ($numeros as $key => $value) {
            DB::table('numeracionordinal')->insert([
                'ordinal' => $value['ordinal'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
