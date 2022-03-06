<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImpugnacionResuelveEstados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['estado' => 'Sin Asignar'],
            ['estado' => 'Asignada sin gestión'],
            ['estado' => 'No Impugnada'],
            ['estado' => 'En Gestión'],
            ['estado' => 'Gestionada'],
            ['estado' => 'Vencida'],
            ['estado' => 'Registrada'],

        ];
        foreach ($tipos as $key => $value) {
            DB::table('impugnacionresuelve_estado')->insert([
                'estado' => $value['estado'],
                'created_at' => '2022-02-20 22:03:14',
                'updated_at' => '2022-02-20 22:03:14',
            ]);
        }
    }
}
