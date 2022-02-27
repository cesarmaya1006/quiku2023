<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImpugnacionEstados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['estado' => 'En Tiempo'],
            ['estado' => 'Fuera de terminos'],
            ['estado' => 'Cerrada'],

        ];
        foreach ($tipos as $key => $value) {
            DB::table('impugnacion_estado')->insert([
                'estado' => $value['estado'],
                'created_at' => '2022-02-20 22:03:14',
                'updated_at' => '2022-02-20 22:03:14',
            ]);
        }
    }
}
