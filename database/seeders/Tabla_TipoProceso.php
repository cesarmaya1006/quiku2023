<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_TipoProceso extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoProceso = [
            ['tipo_proceso' => 'CONCILIACIÓN '],
            ['tipo_proceso' => 'LABORAL ORDINARIO '],
            ['tipo_proceso' => 'PROCESO EJECUTIVO '],
            ['tipo_proceso' => 'ACCIÓN DE CUMPLIMIENTO '],
            ['tipo_proceso' => 'ACCIÓN DE GRUPO '],
            ['tipo_proceso' => 'ACCIÓN DE TUTELA '],
            ['tipo_proceso' => 'INCIDENTE DE DESACATO '],
            ['tipo_proceso' => 'CONCILIACIÓN EXTRAJUDICIAL'],
            ['tipo_proceso' => 'CONCILIACIÓN EXTRAJUDICIAL ADMINISTRATIVO '],
            ['tipo_proceso' => 'DERECHO DE PETICIÓN '],
            ['tipo_proceso' => 'EXTENSIÓN JURISPRUDENCIAL CONSEJO DE ESTADO'],
            ['tipo_proceso' => 'PROCEDIMIENTO ADMINISTRATIVO GENERAL '],
            ['tipo_proceso' => 'PROCEDIMIENTO ADMNISTRATIVO SANCIONATORIO '],
            ['tipo_proceso' => 'PROCEDIMIENTO PARA LA IMPOSICIÓN DE MULTAS, SANCIONES Y DECLARACIONES DE INCUMPLIMIENTO '],
            ['tipo_proceso' => 'RECURSOS CONTRA LOS ACTOS ADMINISTRATIVOS '],
            ['tipo_proceso' => 'RECURSOS DE LA VÍA GUBERNATIVA'],
            ['tipo_proceso' => 'PROCESO CIVIL '],
            ['tipo_proceso' => 'OTRO TIPO DE PROCESO'],


        ];
        foreach ($tipoProceso as $item) {
            DB::table('tipo_proceso')->insert([
                'tipo_proceso' => utf8_decode(utf8_encode($item['tipo_proceso'])),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
