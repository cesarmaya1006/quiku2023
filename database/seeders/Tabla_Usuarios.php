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
        DB::table('usuarios')->insert([
            'usuario' => 'adminsis',
            'password' => bcrypt('adminsis'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id' => 1,
            'usuario_id' => 1,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuarios')->insert([
            'usuario' => 'superadmin',
            'password' => bcrypt('superadmin'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id' => 2,
            'usuario_id' => 2,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuarios')->insert([
            'usuario' => 'admin',
            'password' => bcrypt('admin'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id' => 3,
            'usuario_id' => 3,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'asignador',
            'password' => bcrypt('asignador'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 4,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 4,
            'docutipos_id' => 1,
            'cargo_id' => 1,
            'sede_id' => 1,
            'identificacion' => '90000002',
            'nombre1' => 'Asignador',
            'nombre2' => '',
            'apellido1' => 'Bromelias',
            'telefono_celu' => '1111112233',
            'direccion' => 'bromelias',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'bromelias2022@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'empleado',
            'password' => bcrypt('bromelias2022'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 5,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 5,
            'docutipos_id' => 1,
            'cargo_id' => 2,
            'sede_id' => 1,
            'identificacion' => '90000001',
            'nombre1' => 'Empleado',
            'nombre2' => '',
            'apellido1' => 'Prueba',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'empleado11@gmail.com',
            'url' => '1639338864-firma.png',
            'extension' => 'png',
            'peso' => 2.46,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);        //------------------------------------------------------

        //------------------------------------------------------
    }
}
