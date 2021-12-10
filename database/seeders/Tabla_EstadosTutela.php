<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_EstadosTutela extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            ['estado_funcionario' => 'Sin radicar'],
            ['estado_funcionario' => 'Radicada'],
            ['estado_funcionario' => 'En trámite'],
            ['estado_funcionario' => 'Cerrado'],
        ];
        foreach ($estados as $key => $value) {
            DB::table('estadostutela')->insert([
                'estado_funcionario' => $value['estado_funcionario'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
