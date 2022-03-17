<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrimeraSentencia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sentenciapinstancia')->insert([
            'id' => '1',
            'fecha_sentencia' => '2022-02-20',
            'fecha_notificacion' => '2022-02-21 03:02:13',
            'sentencia' => 'Parcialmente desfavorable',
            'url_sentencia' => '1645412594-EJEMPLO SENT PRIMERA INSTANCIA.pdf',
            'created_at' => '2022-02-21 03:03:14',
            'updated_at' => '2022-02-21 03:03:14',
        ]);
    }
}
