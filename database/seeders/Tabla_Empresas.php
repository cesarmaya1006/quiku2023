<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Empresas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresas = [
            ['docutipos_id' => 6, 'identificacion' => '901097473', 'nombre' => 'MEDIMÁS EPS S.A.S', 'email' => 'mguzmans@medimas.com.co', 'telefono' => '3103180310', 'contacto' => 'Contacto 1', 'cargo' => 'Cargo 1'],
            ['docutipos_id' => 6, 'identificacion' => '79655156-9', 'nombre' => 'DEIANA GONZALEZ TULLIO', 'email' => 'pauladeiana75@gmail.com', 'telefono' => '3124783762', 'contacto' => 'Contacto 2', 'cargo' => 'Cargo 2'],
            ['docutipos_id' => 6, 'identificacion' => '900603394-1', 'nombre' => 'CLINICA VETERINARIA COUNTRY CAN SAS.', 'email' => 'admin@countrycan.com.co', 'telefono' => '305 7499375', 'contacto' => 'Contacto 3', 'cargo' => 'Cargo 3'],
            ['docutipos_id' => 6, 'identificacion' => '800231848 -1', 'nombre' => 'ESMERALDAS SANTA ROSA S.A', 'email' => 'recursoshumanos@esmeraldassantarosa.com', 'telefono' => '7034668', 'contacto' => 'Contacto 4', 'cargo' => 'Cargo 4'],
            ['docutipos_id' => 6, 'identificacion' => '830114167-2', 'nombre' => 'CENTRO MÉDICO DEPORTIVO MET LTDA.', 'email' => 'Administracion@centromedicomet.com', 'telefono' => '3124524126', 'contacto' => 'Contacto 5', 'cargo' => 'Cargo 5'],
            ['docutipos_id' => 6, 'identificacion' => '900514621-5', 'nombre' => 'HAPPY  VENDING  LOGÍSTICA  S.A.S', 'email' => 'santicruzo@gmail.com', 'telefono' => '3197184843', 'contacto' => 'Contacto 6', 'cargo' => 'Cargo 6'],
            ['docutipos_id' => 6, 'identificacion' => '900672970-7', 'nombre' => 'GIMNASIO PSICOPEDAGÓGICO MARÍA ISABEL SAS', 'email' => 'bohorquez.isabel@gmail.com', 'telefono' => '2608602', 'contacto' => 'Contacto 7', 'cargo' => 'Cargo 7'],
            ['docutipos_id' => 6, 'identificacion' => '899999017-4', 'nombre' => 'SOCIEDAD DE CIRUGÍA DE BOGOTÁ HOSPITAL DE SAN JOSÉ', 'email' => 'jcamargo@hospitaldesanjose.org.co', 'telefono' => '3538000', 'contacto' => 'Contacto 8', 'cargo' => 'Cargo 8'],
            ['docutipos_id' => 6, 'identificacion' => '901087750-8', 'nombre' => 'PRESTNEWCO SAS', 'email' => 'coordinacionprestnewco@gmail.com', 'telefono' => '3058169445', 'contacto' => 'Contacto 9', 'cargo' => 'Cargo 9'],
            ['docutipos_id' => 6, 'identificacion' => '901087751-5', 'nombre' => 'PRESTMED S.A.S', 'email' => 'coordinacionprestmed@gmail.com', 'telefono' => '3058169445', 'contacto' => 'Contacto 10', 'cargo' => 'Cargo 10'],
            ['docutipos_id' => 6, 'identificacion' => '901204044-9', 'nombre' => 'EDITORIAL TIRANT LO BLANCH S.A.S', 'email' => 'tdangond@tirant.com', 'telefono' => '3046318785', 'contacto' => 'Contacto 11', 'cargo' => 'Cargo 11'],
            ['docutipos_id' => 6, 'identificacion' => '830076669-4', 'nombre' => 'GRUPO OET ORGANIZACIÓN EL TRANSPORTE S.A.S', 'email' => 'juan.rodriguez@eltransporte.org', 'telefono' => '3115991235', 'contacto' => 'Contacto 12', 'cargo' => 'Cargo 12'],

        ];
        foreach ($empresas as $item) {
            DB::table('empresas')->insert([
                'docutipos_id' => $item['docutipos_id'],
                'identificacion' => $item['identificacion'],
                'nombre' => ucwords(mb_strtolower($item['nombre'])),
                'email' => strtolower(utf8_encode($item['email'])),
                'telefono' => $item['telefono'],
                'contacto' => ucwords(strtolower($item['contacto'])),
                'cargo' => ucwords(strtolower($item['cargo'])),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
