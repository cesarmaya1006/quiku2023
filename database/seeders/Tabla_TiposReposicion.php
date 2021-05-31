<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_TiposReposicion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            'Aclaración y/o corrección',
            'Reposición',
            'Apelación',
            'Reposición y apelación',
        ];
        foreach ($tipos as $key => $value) {
            DB::table('tipo_reposicion')->insert([
                'tipo' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
