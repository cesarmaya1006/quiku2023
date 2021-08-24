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
            'usuario' => 'usuario1',
            'password' => bcrypt('clave'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 6,
            'usuario_id' => 4,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('usuariotemp')->insert([
            'tipo_persona' => 2,
            'docutipos_id' => 1,
            'identificacion' => '10000001',
            'email' => 'usuario1@gmail.com',
            'estado' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('personas')->insert([
            'id' => 4,
            'docutipos_id' => 1,
            'identificacion' => '10000001',
            'nombre1' => 'Carlos',
            'nombre2' => 'Jose',
            'apellido1' => 'Perez',
            'apellido2' => 'Jimenez',
            'telefono_celu' => '3126549898',
            'direccion' => 'Calle de prueba 1',
            'telefono_celu' => '3126549898',
            'pais_id' => 44,
            'municipio_id' => 149,
            'nacionalidad' => 'Colombiano',
            'grado_educacion' => 'Superior',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1995-11-05',
            'grupo_etnico' => '1',
            'discapacidad' => '0',
            'email' => 'usuario1@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'empleado1',
            'password' => bcrypt('clave'),
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
            'cargo_id' => 1,
            'sede_id' => 1,
            'identificacion' => '90000001',
            'nombre1' => 'Juan',
            'nombre2' => 'Carlos',
            'apellido1' => 'Rojas',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'empleado11@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'asignador',
            'password' => bcrypt('clave'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 6,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 6,
            'docutipos_id' => 1,
            'cargo_id' => 2,
            'sede_id' => 1,
            'identificacion' => '90000002',
            'nombre1' => 'Asignador',
            'nombre2' => '',
            'apellido1' => 'Pqr',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'asignador1|@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        for ($i = 7; $i < 12; $i++) {
            DB::table('usuarios')->insert([
                'usuario' => 'empleado' . $i,
                'password' => bcrypt('clave'),
                'camb_password' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            DB::table('usuario_rol')->insert([
                'rol_id' => 5,
                'usuario_id' => $i,
                'estado' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            DB::table('empleados')->insert([
                'id' => $i,
                'docutipos_id' => 1,
                'cargo_id' => 1,
                'sede_id' => 1,
                'identificacion' => '9000000' . $i,
                'nombre1' => 'Empleado' . $i,
                'nombre2' => '',
                'apellido1' => 'apellido' . $i,
                'telefono_celu' => '35011122' . $i,
                'direccion' => 'Calle de prueba ' . $i,
                'genero' => 'Masculino',
                'fecha_nacimiento' => '1990-11-05',
                'email' => 'empleado' . $i . '@gmail.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        //------------------------------------------------------
        for ($i = 12; $i < 17; $i++) {
            DB::table('usuarios')->insert([
                'usuario' => 'empleado' . $i,
                'password' => bcrypt('clave'),
                'camb_password' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            DB::table('usuario_rol')->insert([
                'rol_id' => 5,
                'usuario_id' => $i,
                'estado' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            DB::table('empleados')->insert([
                'id' => $i,
                'docutipos_id' => 1,
                'cargo_id' => 3,
                'sede_id' => 1,
                'identificacion' => '9000000' . $i,
                'nombre1' => 'Empleado' . $i,
                'nombre2' => '',
                'apellido1' => 'apellido' . $i,
                'telefono_celu' => '35011122' . $i,
                'direccion' => 'Calle de prueba ' . $i,
                'genero' => 'Masculino',
                'fecha_nacimiento' => '1990-11-05',
                'email' => 'empleado' . $i . '@gmail.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        //------------------------------------------------------
        for ($i = 17; $i < 22; $i++) {
            DB::table('usuarios')->insert([
                'usuario' => 'empleado' . $i,
                'password' => bcrypt('clave'),
                'camb_password' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            DB::table('usuario_rol')->insert([
                'rol_id' => 5,
                'usuario_id' => $i,
                'estado' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            DB::table('empleados')->insert([
                'id' => $i,
                'docutipos_id' => 1,
                'cargo_id' => 4,
                'sede_id' => 1,
                'identificacion' => '9000000' . $i,
                'nombre1' => 'Empleado' . $i,
                'nombre2' => '',
                'apellido1' => 'apellido' . $i,
                'telefono_celu' => '35011122' . $i,
                'direccion' => 'Calle de prueba ' . $i,
                'genero' => 'Masculino',
                'fecha_nacimiento' => '1990-11-05',
                'email' => 'empleado' . $i . '@gmail.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        //------------------------------------------------------

    }
}
