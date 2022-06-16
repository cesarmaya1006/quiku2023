<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Submotivotutelas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_motivos = [
            ['motivotutelas_id' => '1', 'sub_motivo' => 'Sub Motivo 1'],
            ['motivotutelas_id' => '1', 'sub_motivo' => 'Sub Motivo 2'],
            ['motivotutelas_id' => '1', 'sub_motivo' => 'Sub Motivo 3'],
            ['motivotutelas_id' => '1', 'sub_motivo' => 'Sub Motivo 4'],
            ['motivotutelas_id' => '1', 'sub_motivo' => 'Sub Motivo 5'],

            ['motivotutelas_id' => '2', 'sub_motivo' => 'Sub Motivo 1'],
            ['motivotutelas_id' => '2', 'sub_motivo' => 'Sub Motivo 2'],
            ['motivotutelas_id' => '2', 'sub_motivo' => 'Sub Motivo 3'],
            ['motivotutelas_id' => '2', 'sub_motivo' => 'Sub Motivo 4'],
            ['motivotutelas_id' => '2', 'sub_motivo' => 'Sub Motivo 5'],

            ['motivotutelas_id' => '3', 'sub_motivo' => 'Sub Motivo 1'],
            ['motivotutelas_id' => '3', 'sub_motivo' => 'Sub Motivo 2'],
            ['motivotutelas_id' => '3', 'sub_motivo' => 'Sub Motivo 3'],
            ['motivotutelas_id' => '3', 'sub_motivo' => 'Sub Motivo 4'],
            ['motivotutelas_id' => '3', 'sub_motivo' => 'Sub Motivo 5'],

            ['motivotutelas_id' => '4', 'sub_motivo' => 'Sub Motivo 1'],
            ['motivotutelas_id' => '4', 'sub_motivo' => 'Sub Motivo 2'],
            ['motivotutelas_id' => '4', 'sub_motivo' => 'Sub Motivo 3'],
            ['motivotutelas_id' => '4', 'sub_motivo' => 'Sub Motivo 4'],
            ['motivotutelas_id' => '4', 'sub_motivo' => 'Sub Motivo 5'],

        ];
        foreach ($sub_motivos as $key => $value) {
            DB::table('submotivotutelas')->insert([
                'motivotutelas_id' => $value['motivotutelas_id'],
                'sub_motivo' => $value['sub_motivo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
