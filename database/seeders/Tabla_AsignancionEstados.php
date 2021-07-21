<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_AsignancionEstados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            ['estado' => 'Inicial'],
            ['estado' => 'En trámite'],
            ['estado' => 'Completado']
        ];
        foreach ($estados as $key => $value) {
            DB::table('asignancion_estados')->insert([
                'estado' => $value['estado'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
