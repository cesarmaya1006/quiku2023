<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_AsignacionParticularPQR extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles = [
            ['tipo' => 'Permanente', 'prodserv' => 'Producto', 'cantidad' => '1', 'tipo_pqr_id' => '1', 'sede_id' => '1', 'cargo_id' => '1'],
            ['tipo' => 'Permanente', 'prodserv' => 'Producto', 'cantidad' => '1', 'tipo_pqr_id' => '2', 'sede_id' => '1', 'cargo_id' => '3'],
            ['tipo' => 'Permanente', 'prodserv' => 'Producto', 'cantidad' => '1', 'tipo_pqr_id' => '3', 'sede_id' => '1', 'cargo_id' => '4'],
            ['tipo' => 'Permanente', 'prodserv' => 'Producto', 'cantidad' => '1', 'tipo_pqr_id' => '4', 'sede_id' => '1', 'cargo_id' => '1'],
            ['tipo' => 'Permanente', 'prodserv' => 'Producto', 'cantidad' => '1', 'tipo_pqr_id' => '5', 'sede_id' => '1', 'cargo_id' => '3'],
            ['tipo' => 'Permanente', 'prodserv' => 'Producto', 'cantidad' => '1', 'tipo_pqr_id' => '6', 'sede_id' => '1', 'cargo_id' => '4'],
            ['tipo' => 'Permanente', 'prodserv' => 'Producto', 'cantidad' => '1', 'tipo_pqr_id' => '7', 'sede_id' => '1', 'cargo_id' => '1'],
            ['tipo' => 'Permanente', 'prodserv' => 'Producto', 'cantidad' => '1', 'tipo_pqr_id' => '8', 'sede_id' => '1', 'cargo_id' => '3'],
            ['tipo' => 'Permanente', 'prodserv' => 'Producto', 'cantidad' => '1', 'tipo_pqr_id' => '9', 'sede_id' => '1', 'cargo_id' => '4'],


        ];
        foreach ($niveles as $key => $value) {
            DB::table('asignacion_particular_pqr')->insert([
                'tipo' => $value['tipo'],
                'prodserv' => $value['prodserv'],
                'cantidad' => $value['cantidad'],
                'tipo_pqr_id' => $value['tipo_pqr_id'],
                'sede_id' => $value['sede_id'],
                'cargo_id' => $value['cargo_id'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        DB::table('asignacion_particular_pqr')->insert([
            'tipo' => 'Permanente',
            'prodserv' => 'Producto',
            'cantidad' => '1',
            'tipo_pqr_id' => '1',
            'motivo_id' => '2',
            'sede_id' => '1',
            'cargo_id' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
