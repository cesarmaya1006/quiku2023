<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_EmpresaProveedores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $identificacion = 777444100;
        $telefono1 = 3157894545;
        $telefono2 = 3139632121;
        for ($i = 1; $i <= 50; $i++) {
            DB::table('empresaproveedores')->insert([
                'empresa_id' => 1,
                'docutipos_id' => 6,
                'identificacion' => $identificacion + $i,
                'nombre' => 'Proveedor prueba ' . $i,
                'direccion' => 'Direccion proveedor prueba ' . $i,
                'email' => 'proveedor' . $i . '@gmail.com',
                'telefono' => $telefono1 + $i,
                'nom_contacto' => 'Contacto proveedor ' . $i,
                'tel_contacto' => $telefono2 + $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
