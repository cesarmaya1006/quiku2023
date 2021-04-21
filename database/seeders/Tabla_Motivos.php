<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Motivos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivos = [
            ['tipo_pqr_id' => '1', 'motivo' => 'Petición o consulta'],
            ['tipo_pqr_id' => '1', 'motivo' => 'Retracto'],
            ['tipo_pqr_id' => '2', 'motivo' => 'Queja por mal trato de un funcionario'],
            ['tipo_pqr_id' => '2', 'motivo' => 'Queja por mal funcionamiento de página web o APP'],
            ['tipo_pqr_id' => '2', 'motivo' => 'Queja por mal servicio'],
            ['tipo_pqr_id' => '3', 'motivo' => 'Reclamo de garantía de un bien o servicio'],
            ['tipo_pqr_id' => '3', 'motivo' => 'Reclamo por publicidad engañosa'],
            ['tipo_pqr_id' => '3', 'motivo' => 'Reclamo por demora en entrega o prestación'],
            ['tipo_pqr_id' => '3', 'motivo' => 'Reclamo por facturación o pago'],

        ];
        foreach ($motivos as $key => $value) {
            DB::table('motivos')->insert([
                'tipo_pqr_id' => $value['tipo_pqr_id'],
                'motivo' => $value['motivo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
