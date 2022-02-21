<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutelaMotivo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tutela_motivo')->insert([
            'auto_admisorio_id' => '1',
            'motivo_tutela' => 'Motivo 1',
            'sub_motivo_tutela' => 'Sub 1',
            'tipo_tutela' => 'Producto',
            'created_at' => '2022-02-20 18:23:50',
            'updated_at' => '2022-02-20 18:23:50',
        ]);
    }
}
