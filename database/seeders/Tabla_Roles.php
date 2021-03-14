<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rols = [
            'Administrador Sistema',
            'Administrador',
            'Apoderado',
            'Asistente Legal',
            'Empresa',
            'Empleado',
        ];
        foreach ($rols as $key => $value) {
            DB::table('roles')->insert([
                'nombre' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
