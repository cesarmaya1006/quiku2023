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
            'usuario' => 'usuario1',
            'password' => bcrypt('clave'),
            'camb_password' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 6,
            'usuario_id' => 1,
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
    }
}
