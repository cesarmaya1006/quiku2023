<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Demandados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('demandados')->insert(['proceso_id' => '1', 'nombres' => utf8_decode(utf8_encode('MEDIMÁS EPS S.A.S')), 'tipo_docu_id' => '6', 'identificacion' => utf8_decode(utf8_encode('901097473')), 'email' => utf8_decode(utf8_encode('mguzmans@medimas.com.co')), 'telefono' => utf8_decode(utf8_encode('3103180310')), 'direccion' => utf8_decode(utf8_encode('Av. Kr. 45 No. 108 - 27 Piso 7 T -1')), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('demandados')->insert(['proceso_id' => '2', 'nombres' => utf8_decode(utf8_encode('ESMERALDAS SANTA ROSA S.A')), 'tipo_docu_id' => '6', 'identificacion' => utf8_decode(utf8_encode('800.231.848 -1')), 'email' => utf8_decode(utf8_encode('recursoshumanos@esmeraldassantarosa.com')), 'telefono' => utf8_decode(utf8_encode('7034668')), 'direccion' => utf8_decode(utf8_encode('Avenida 9 No. 113 - 52')), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('demandados')->insert(['proceso_id' => '3', 'nombres' => utf8_decode(utf8_encode('PRESTNEWCO SAS')), 'tipo_docu_id' => '6', 'identificacion' => utf8_decode(utf8_encode('901.087.750-8')), 'email' => utf8_decode(utf8_encode('coordinacionprestnewco@gmail.com')), 'telefono' => utf8_decode(utf8_encode('3058169445')), 'direccion' => utf8_decode(utf8_encode('Av. Carrera 45 No. 108 - 27 Torre 1 Piso 7 ')), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('demandados')->insert(['proceso_id' => '3', 'nombres' => utf8_decode(utf8_encode('PRESTMED S.A.S')), 'tipo_docu_id' => '6', 'identificacion' => utf8_decode(utf8_encode('901.087.751-5')), 'email' => utf8_decode(utf8_encode('coordinacionprestmed@gmail.com')), 'telefono' => utf8_decode(utf8_encode('3058169445')), 'direccion' => utf8_decode(utf8_encode('Av. Carrera 45 No. 108 - 27 Torre 1 Piso 7 ')), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('demandados')->insert(['proceso_id' => '4', 'nombres' => utf8_decode(utf8_encode('PRESTNEWCO SAS')), 'tipo_docu_id' => '6', 'identificacion' => utf8_decode(utf8_encode('901.087.750-8')), 'email' => utf8_decode(utf8_encode('coordinacionprestnewco@gmail.com')), 'telefono' => utf8_decode(utf8_encode('3058169445')), 'direccion' => utf8_decode(utf8_encode('Av. Carrera 45 No. 108 - 27 Torre 1 Piso 7 ')), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('demandados')->insert(['proceso_id' => '4', 'nombres' => utf8_decode(utf8_encode('PRESTMED S.A.S')), 'tipo_docu_id' => '6', 'identificacion' => utf8_decode(utf8_encode('901.087.751-5')), 'email' => utf8_decode(utf8_encode('coordinacionprestmed@gmail.com')), 'telefono' => utf8_decode(utf8_encode('3058169445')), 'direccion' => utf8_decode(utf8_encode('Av. Carrera 45 No. 108 - 27 Torre 1 Piso 7 ')), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),]);
    }
}
