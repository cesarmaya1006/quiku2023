<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_EstadosPQR extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            ['estado_usuario' => 'Radicada', 'estado_funcionario' => 'Radicada, sin iniciar tramite'],
            ['estado_usuario' => 'En trámite', 'estado_funcionario' => 'En terminos'],
            ['estado_usuario' => 'En trámite', 'estado_funcionario' => 'Proxima a vencer'],
            ['estado_usuario' => 'En trámite', 'estado_funcionario' => 'Vencida'],
            ['estado_usuario' => 'Pendiente de aclaración o complementación', 'estado_funcionario' => 'Pendiente de aclaración o complementación'],
            ['estado_usuario' => 'Cerrado ', 'estado_funcionario' => 'Cerrado '],
            ['estado_usuario' => 'Solucionado con opcion de recurso', 'estado_funcionario' => 'Solucionado con opcion de recurso'],
            ['estado_usuario' => 'En tramite de recurso', 'estado_funcionario' => 'En tramite de recurso'],
            ['estado_usuario' => 'Cerrado; Solucionado con opcion de recurso', 'estado_funcionario' => 'Cerrado; Solucionado con opcion de recurso'],
            ['estado_usuario' => 'Cerrado', 'estado_funcionario' => 'Cerrado'],

        ];
        foreach ($estados as $key => $value) {
            DB::table('estadospqr')->insert([
                'estado_usuario' => $value['estado_usuario'],
                'estado_funcionario' => $value['estado_funcionario'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
