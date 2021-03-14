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
        //------------------------------------------------------

        $numItem = 2;
        //-------------------------------------------------------------
        $usuarios = [
            ['docutipos_id' => '1', 'identificacion' => '1018417398', 'nombres' => 'Juliana Patricia', 'apellidos' => 'Morad Acero', 'email' => 'jmorad@mglasociados.com', 'telefono' => '3132816476', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => '1', 'identificacion' => '1018414979', 'nombres' => 'Fabio Alejandro', 'apellidos' => 'Gómez Castaño', 'email' => 'agomez@mglasociados.com', 'telefono' => '3006185741', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => '1', 'identificacion' => '1020752947', 'nombres' => 'Daniel Alejandro', 'apellidos' => 'López Morales', 'email' => 'dlopez@mglasociados.com', 'telefono' => '3004655258', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => '1', 'identificacion' => '1030636190', 'nombres' => 'Angie Viviana', 'apellidos' => 'Gutierrez Peña', 'email' => 'consultas@mglasociados.com', 'telefono' => '3132613546', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => '1', 'identificacion' => '1010216510', 'nombres' => 'Maria Camila', 'apellidos' => 'Castillo Puentes', 'email' => 'litigio@mglasociados.com', 'telefono' => '3214628429', 'password' => bcrypt('mgl'), 'camb_password' => '1'],

        ];
        $numApoderados = $numItem;
        foreach ($usuarios as $item) {
            DB::table('usuarios')->insert([
                'docutipos_id' => $item['docutipos_id'],
                'identificacion' => $item['identificacion'],
                'nombres' => utf8_decode(utf8_encode($item['nombres'])),
                'apellidos' => utf8_decode(utf8_encode($item['apellidos'])),
                'email' => $item['email'],
                'telefono' => $item['telefono'],
                'password' => $item['password'],
                'camb_password' => $item['camb_password'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            DB::table('usuario_rol')->insert([
                'rol_id' => 3,
                'usuario_id' => $numItem,
                'estado' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $numItem = $numItem + 1;
        }

        $apoderados = [
            ['tarjet_profes' => '249746', 'docume_cedula' => '1018417398.pdf', 'docume_t_prof' => '249746.pdf'],
            ['tarjet_profes' => '237180', 'docume_cedula' => '1018414979.pdf', 'docume_t_prof' => '237180.pdf'],
            ['tarjet_profes' => '263803', 'docume_cedula' => '1020752947.pdf', 'docume_t_prof' => '263803.pdf'],
            ['tarjet_profes' => '313116', 'docume_cedula' => '1030636190.pdf', 'docume_t_prof' => '313116.pdf'],
            ['tarjet_profes' => '330044', 'docume_cedula' => '1010216510.pdf', 'docume_t_prof' => '330044.pdf'],

        ];
        foreach ($apoderados as $item) {
            DB::table('apoderados')->insert([
                'id' =>  $numApoderados,
                'tarjet_profes' => utf8_decode(utf8_encode($item['tarjet_profes'])),
                'docume_cedula' => utf8_decode(utf8_encode($item['docume_cedula'])),
                'docume_t_prof' => utf8_decode(utf8_encode($item['docume_t_prof'])),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $numApoderados++;
        }
        //-------------------------------------------------------------
        $usuarios = [
            ['docutipos_id' => '1', 'identificacion' => '1118650938', 'nombres' => 'Jonier Adiel', 'apellidos' => 'Atilua Bastilla', 'email' => 'jonier134_adiel@hotmail.com', 'telefono' => '3116466343', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => '1', 'identificacion' => '1014195305', 'nombres' => 'Milena', 'apellidos' => 'Casas Cortes ', 'email' => 'admin@mglasociados.com', 'telefono' => '3102017133', 'password' => bcrypt('mgl'), 'camb_password' => '1'],

        ];
        $numAsistentes = $numItem;
        foreach ($usuarios as $item) {
            DB::table('usuarios')->insert([
                'docutipos_id' => $item['docutipos_id'],
                'identificacion' => $item['identificacion'],
                'nombres' => utf8_decode(utf8_encode($item['nombres'])),
                'apellidos' => utf8_decode(utf8_encode($item['apellidos'])),
                'email' => $item['email'],
                'telefono' => $item['telefono'],
                'password' => $item['password'],
                'camb_password' => $item['camb_password'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            DB::table('usuario_rol')->insert([
                'rol_id' => 4,
                'usuario_id' => $numItem,
                'estado' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $numItem = $numItem + 1;
        }
        $asistentes = [
            ['usuario_id' => '19', 'tarjet_profes' => '1118650938', 'docume_cedula' => 'cc-1118650938.pdf', 'docume_t_prof' => 'carnet-1118650938.pdf'],
            ['usuario_id' => '20', 'tarjet_profes' => '1014195305', 'docume_cedula' => 'cc-1014195305.pdf', 'docume_t_prof' => 'carnet-1014195305.pdf'],

        ];
        foreach ($asistentes as $item) {
            DB::table('asistentes')->insert([
                'id' => $numAsistentes,
                'tarjet_profes' => utf8_decode(utf8_encode($item['tarjet_profes'])),
                'docume_cedula' => utf8_decode(utf8_encode($item['docume_cedula'])),
                'docume_t_prof' => utf8_decode(utf8_encode($item['docume_t_prof'])),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $numAsistentes++;
        }
        //-------------------------------------------------------------
        $empleados = [
            ['docutipos_id' => 1, 'identificacion' => '32244128', 'nombres' => 'DIANA', 'apellidos' => 'MONTOYA', 'email' => 'empleado1@mgl.com', 'telefono' => '2880868', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1000018726', 'nombres' => 'MAYRA CAMILA', 'apellidos' => 'ZAMBRANO', 'email' => 'empleado2@mgl.com', 'telefono' => '3042060025', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1000457519', 'nombres' => 'JUAN DAVID', 'apellidos' => 'LARIOS', 'email' => 'empleado3@mgl.com', 'telefono' => '3005181281', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1000805504', 'nombres' => 'LAURA MARCELA', 'apellidos' => 'VELANDIA', 'email' => 'empleado4@mgl.com', 'telefono' => '5673552', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1001083801', 'nombres' => 'JUAN PABLO', 'apellidos' => 'MORA ', 'email' => 'empleado5@mgl.com', 'telefono' => '3502645728', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1003505505', 'nombres' => 'MARGARITA ', 'apellidos' => 'AVALOS', 'email' => 'empleado6@mgl.com', 'telefono' => '3117405000', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1010025432', 'nombres' => 'ANDRES FELIPE', 'apellidos' => 'MARTINEZ', 'email' => 'empleado7@mgl.com', 'telefono' => '3227025337', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1010119873', 'nombres' => 'Richard Enrique', 'apellidos' => 'Barrera', 'email' => 'empleado8@mgl.com', 'telefono' => '7429002', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1010170925', 'nombres' => 'SANDRA MILENA', 'apellidos' => 'CAIPA', 'email' => 'empleado9@mgl.com', 'telefono' => '7124177', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1010191684', 'nombres' => 'MARIA CAMILA ', 'apellidos' => 'NIETO ', 'email' => 'empleado10@mgl.com', 'telefono' => '8012463', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1010195594', 'nombres' => 'JIMMY JEFFRY', 'apellidos' => 'OSORIO', 'email' => 'empleado11@mgl.com', 'telefono' => '3372028', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1010211067', 'nombres' => 'OSCAR ALEXANDER', 'apellidos' => 'CAMELO', 'email' => 'empleado12@mgl.com', 'telefono' => '3917627', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1010217262', 'nombres' => 'JOSE ANDRES', 'apellidos' => 'SUAVITA', 'email' => 'empleado13@mgl.com', 'telefono' => '7262445', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1010219797', 'nombres' => 'BYRON', 'apellidos' => 'VARON', 'email' => 'empleado14@mgl.com', 'telefono' => '2004132', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1010224591', 'nombres' => 'ALLISON DANIELA', 'apellidos' => 'MEDELLIN', 'email' => 'empleado15@mgl.com', 'telefono' => '3212720464', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1012374754', 'nombres' => 'NEYLA MARYURI ', 'apellidos' => 'TELLEZ', 'email' => 'empleado16@mgl.com', 'telefono' => '4492273', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1012380992', 'nombres' => 'EDWIN IVAN', 'apellidos' => 'ALONSO', 'email' => 'empleado17@mgl.com', 'telefono' => '3125647983', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1012385195', 'nombres' => 'Andres Felipe', 'apellidos' => 'Parra', 'email' => 'empleado18@mgl.com', 'telefono' => '', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1012388529', 'nombres' => 'NELSON ADOLFO', 'apellidos' => 'HOYOS', 'email' => 'empleado19@mgl.com', 'telefono' => '4548907', 'password' => bcrypt('mgl'), 'camb_password' => '1'],
            ['docutipos_id' => 1, 'identificacion' => '1012422191', 'nombres' => 'MIGUEL ANGEL', 'apellidos' => 'ARAQUE', 'email' => 'empleado20@mgl.com', 'telefono' => '7856346', 'password' => bcrypt('mgl'), 'camb_password' => '1'],

        ];
        foreach ($empleados as $item) {
            DB::table('usuarios')->insert([
                'docutipos_id' => $item['docutipos_id'],
                'identificacion' => $item['identificacion'],
                'nombres' => utf8_decode(utf8_encode($item['nombres'])),
                'apellidos' => utf8_decode(utf8_encode($item['apellidos'])),
                'email' => $item['email'],
                'telefono' => $item['telefono'],
                'password' => $item['password'],
                'camb_password' => $item['camb_password'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            DB::table('usuario_rol')->insert([
                'rol_id' => 6,
                'usuario_id' => $numItem,
                'estado' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $numItem = $numItem + 1;
        }
        //-------------------------------------------------------------


    }
}
