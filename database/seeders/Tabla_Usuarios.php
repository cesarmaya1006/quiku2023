<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'docutipos_id' => 1,
            'identificacion' => '79984883',
            'nombres' => 'Cesar Eduardo',
            'apellidos' => 'Maya Toloza',
            'email' => 'cesarmaya1006@gmail.com',
            'telefono' => '350 807 9232',
            'password' => bcrypt('mayo'),
            'camb_password' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id' => 1,
            'usuario_id' => 1,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
