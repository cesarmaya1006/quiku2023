<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_EmpresasProcesos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes_proc = [
            ['procesos_id' => '1', 'empresa_id' => '1', 'papel_id' => '2'],
            ['procesos_id' => '2', 'empresa_id' => '5', 'papel_id' => '2'],
            ['procesos_id' => '3', 'empresa_id' => '10', 'papel_id' => '2'],
            ['procesos_id' => '4', 'empresa_id' => '10', 'papel_id' => '2'],
            ['procesos_id' => '3', 'empresa_id' => '11', 'papel_id' => '2'],
            ['procesos_id' => '4', 'empresa_id' => '11', 'papel_id' => '2'],

        ];
        foreach ($clientes_proc as $item) {
            DB::table('empresas_procesos')->insert([
                'procesos_id' => $item['procesos_id'],
                'empresa_id' => $item['empresa_id'],
                'papel_id' => $item['papel_id'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
