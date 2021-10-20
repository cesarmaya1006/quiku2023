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
            'usuario' => 'usuario',
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
            'email' => 'quiku2021@gmail.com',
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
            'email' => 'quiku2021@gmail.com',
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
            'usuario_id' => 5,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 5,
            'docutipos_id' => 1,
            'cargo_id' => 1,
            'sede_id' => 1,
            'identificacion' => '90000002',
            'nombre1' => 'Predeterminado',
            'nombre2' => '',
            'apellido1' => 'Predeterminado',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'asignador1|@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'empleado',
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
            'identificacion' => '90000001',
            'nombre1' => 'Juan',
            'nombre2' => 'Carlos',
            'apellido1' => 'Rojas',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'empleado11@gmail.com',
            'url' => '1634739891-firma.png',
            'extension' => 'png',
            'peso' => 2.46,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'dlopez',
            'password' => bcrypt('dlopez'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 7,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 7,
            'docutipos_id' => 1,
            'cargo_id' => 3,
            'sede_id' => 1,
            'identificacion' => '90000007',
            'nombre1' => 'Daniel',
            'nombre2' => '',
            'apellido1' => 'López',
            'apellido2' => 'Morales',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'correo7@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'fgomez',
            'password' => bcrypt('fgomez'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 8,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 8,
            'docutipos_id' => 1,
            'cargo_id' => 3,
            'sede_id' => 1,
            'identificacion' => '90000008',
            'nombre1' => 'Fabio',
            'nombre2' => 'Alejandro',
            'apellido1' => 'Gómez',
            'apellido2' => 'Castaño',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'correo8@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'earango',
            'password' => bcrypt('earango'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 9,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 9,
            'docutipos_id' => 1,
            'cargo_id' => 3,
            'sede_id' => 1,
            'identificacion' => '90000009',
            'nombre1' => 'Eduardo',
            'nombre2' => 'José',
            'apellido1' => 'Arango',
            'apellido2' => 'Montoya',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'correo9@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'jmorad',
            'password' => bcrypt('jmorad'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 10,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 10,
            'docutipos_id' => 1,
            'cargo_id' => 4,
            'sede_id' => 1,
            'identificacion' => '90000010',
            'nombre1' => 'Juliana',
            'nombre2' => '',
            'apellido1' => 'Morad',
            'apellido2' => 'Acero',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'correo10@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'lparra',
            'password' => bcrypt('lparra'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 11,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 11,
            'docutipos_id' => 1,
            'cargo_id' => 6,
            'sede_id' => 1,
            'identificacion' => '90000011',
            'nombre1' => 'Laura',
            'nombre2' => '',
            'apellido1' => 'Cañon',
            'apellido2' => 'Parra',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'correo11@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'sidarraga',
            'password' => bcrypt('sidarraga'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 12,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 12,
            'docutipos_id' => 1,
            'cargo_id' => 5,
            'sede_id' => 1,
            'identificacion' => '90000012',
            'nombre1' => 'Santiago',
            'nombre2' => '',
            'apellido1' => 'Idárraga',
            'apellido2' => 'Moscoso',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'correo12@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'fbravo',
            'password' => bcrypt('fbravo'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 13,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 13,
            'docutipos_id' => 1,
            'cargo_id' => 6,
            'sede_id' => 1,
            'identificacion' => '90000013',
            'nombre1' => 'Fanny',
            'nombre2' => 'Vanesa',
            'apellido1' => 'Bravo',
            'apellido2' => 'Sierra',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'correo13@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
        DB::table('usuarios')->insert([
            'usuario' => 'jmedina',
            'password' => bcrypt('jmedina'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 5,
            'usuario_id' => 14,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empleados')->insert([
            'id' => 14,
            'docutipos_id' => 1,
            'cargo_id' => 7,
            'sede_id' => 1,
            'identificacion' => '90000014',
            'nombre1' => 'José',
            'nombre2' => 'Gregorio',
            'apellido1' => 'Medina',
            'apellido2' => '',
            'telefono_celu' => '3501112233',
            'direccion' => 'Calle de prueba 13',
            'genero' => 'Masculino',
            'fecha_nacimiento' => '1990-11-05',
            'email' => 'correo14@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //------------------------------------------------------
    }
}
