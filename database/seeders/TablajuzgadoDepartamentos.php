<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablajuzgadoDepartamentos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['departamento' => 'AMAZONAS'],
            ['departamento' => 'ANTIOQUIA'],
            ['departamento' => 'ARAUCA'],
            ['departamento' => 'ATLÁNTICO'],
            ['departamento' => 'BOGOTÁ'],
            ['departamento' => 'BOLÍVAR'],
            ['departamento' => 'BOYACÁ'],
            ['departamento' => 'CALDAS'],
            ['departamento' => 'CAQUETÁ'],
            ['departamento' => 'CASANARE'],
            ['departamento' => 'CAUCA'],
            ['departamento' => 'CESAR'],
            ['departamento' => 'CHOCÓ'],
            ['departamento' => 'CÓRDOBA'],
            ['departamento' => 'CUNDINAMARCA'],
            ['departamento' => 'GUAINÍA'],
            ['departamento' => 'GUAVIARE'],
            ['departamento' => 'HUILA'],
            ['departamento' => 'LA GUAJIRA'],
            ['departamento' => 'MAGDALENA'],
            ['departamento' => 'META'],
            ['departamento' => 'NARIÑO'],
            ['departamento' => 'NORTE DE SANTANDER'],
            ['departamento' => 'PUTUMAYO'],
            ['departamento' => 'QUINDÍO'],
            ['departamento' => 'RISARALDA'],
            ['departamento' => 'SAN ANDRÉS'],
            ['departamento' => 'SANTANDER'],
            ['departamento' => 'SUCRE'],
            ['departamento' => 'TOLIMA'],
            ['departamento' => 'VALLE DEL CAUCA'],
            ['departamento' => 'VAUPÉS'],
            ['departamento' => 'VICHADA']

        ];
        foreach ($areas as $item) {
            DB::table('juzgdepartamentos')->insert([
                'departamento' => $item['departamento'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
