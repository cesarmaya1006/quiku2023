<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_WikuPalabrasArgumentos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['wiku_argumento_id' => 1,'wiku_palabras_id' => 1],
            ['wiku_argumento_id' => 1,'wiku_palabras_id' => 2],
            ['wiku_argumento_id' => 1,'wiku_palabras_id' => 3],
            ['wiku_argumento_id' => 2,'wiku_palabras_id' => 4],
            ['wiku_argumento_id' => 2,'wiku_palabras_id' => 5],
            ['wiku_argumento_id' => 3,'wiku_palabras_id' => 6],
            ['wiku_argumento_id' => 3,'wiku_palabras_id' => 7],
            ['wiku_argumento_id' => 3,'wiku_palabras_id' => 1],

        ];
        foreach ($tipos as $key => $value) {
            DB::table('wikupalabrasargumentos')->insert([
                'wiku_argumento_id' => $value['wiku_argumento_id'],
                'wiku_palabras_id' => $value['wiku_palabras_id'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
