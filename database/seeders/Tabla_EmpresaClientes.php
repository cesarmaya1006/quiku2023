<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_EmpresaClientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $identificacion = 999888700;
        $telefono1 = 3126547878;
        $telefono2 = 3126548787;
        for ($i = 1; $i <= 50; $i++) {
            DB::table('empresaclientes')->insert([
                'empresa_id' => 1,
                'tipo_docu_id' => 6,
                'identificacion' => $identificacion + $i,
                'nombre' => 'Cliente prueba ' . $i,
                'direccion' => 'Direccion cliente prueba ' . $i,
                'email' => 'cliente' . $i . '@gmail.com',
                'telefono' => $telefono1 + $i,
                'nom_contacto' => 'Contacto Cliente ' . $i,
                'tel_contacto' => $telefono2 + $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
