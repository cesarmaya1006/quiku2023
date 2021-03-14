<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Demandante extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('demandante')->insert(['proceso_id' => '1', 'nombres' => utf8_decode(utf8_encode('  JESUS BELTRAN VALDERRAMA')), 'tipo_docu_id' => '1', 'identificacion' => utf8_decode(utf8_encode('9522686')), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('demandante')->insert(['proceso_id' => '2', 'nombres' => utf8_decode(utf8_encode('JOSE DESIDERIO PEÑA PEÑA')), 'tipo_docu_id' => '1', 'identificacion' => utf8_decode(utf8_encode('99999999')), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('demandante')->insert(['proceso_id' => '3', 'nombres' => utf8_decode(utf8_encode('MONICA PATRICIA PEDRAZA')), 'tipo_docu_id' => '1', 'identificacion' => utf8_decode(utf8_encode('52250310')), 'telefono' => utf8_decode(utf8_encode('3014271509')), 'direccion' => utf8_decode(utf8_encode('Calle 14 N° 27-74 Santa Marta')), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('demandante')->insert(['proceso_id' => '4', 'nombres' => utf8_decode(utf8_encode('VIVIANA ANDREA SNABRIA')), 'tipo_docu_id' => '1', 'identificacion' => utf8_decode(utf8_encode('40326331')), 'telefono' => utf8_decode(utf8_encode('3138826553')), 'direccion' => utf8_decode(utf8_encode('Cra 9 N 9-34 Barrio Madrigal, Villavicencio')), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),]);
    }
}
