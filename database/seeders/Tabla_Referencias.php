<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Referencias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $referencias = [
            ['marca_id' => '1', 'referencia' => 'Celular alcatel 1066d memoria 4mb dual sim 2g'],
            ['marca_id' => '2', 'referencia' => 'Celular Asus Zenfone Max M1 32GB'],
            ['marca_id' => '3', 'referencia' => 'Caterpillar - Celular cato b26  sumergible en agua'],
            ['marca_id' => '3', 'referencia' => 'Caterpillar - Celular cat s42 resistente a caídas, agua, polvo'],
            ['marca_id' => '3', 'referencia' => 'Caterpillar - Celular catos60 cámara térmica fliro/sumergible'],
            ['marca_id' => '3', 'referencia' => 'Caterpillar - Celular  cats61 cámara térmica, sensor de calidad'],
            ['marca_id' => '4', 'referencia' => 'EPIK - Celular Epik k503t + power bank'],
            ['marca_id' => '4', 'referencia' => 'EPIK - Celular Epik one k406 azul'],
            ['marca_id' => '4', 'referencia' => 'EPIK - Celular Epik one k406 gris'],
            ['marca_id' => '4', 'referencia' => 'EPIK - Celular Epik Leo Turbo K 503 Negro'],
            ['marca_id' => '4', 'referencia' => 'Celular Epik one k503t 32gb negro'],
            ['marca_id' => '5', 'referencia' => 'GENERICO - Celular iswag kronos negro'],
            ['marca_id' => '5', 'referencia' => 'GENERICO - Celular Tipo Barra Iswag Quartz Gris'],
            ['marca_id' => '5', 'referencia' => 'GENERICO - Celular Tipo Barra Iswag Quartz Rojo'],
            ['marca_id' => '5', 'referencia' => 'GENERICO - Celular Tipo Barra Iswag Quartz Negro'],
            ['marca_id' => '5', 'referencia' => 'Celular Tipo Barra Iswag Quartz Negro'],
            ['marca_id' => '6', 'referencia' => 'GO-CEL - Celular smartphone GO-CEL sm 16gb red 4g azul'],
            ['marca_id' => '6', 'referencia' => 'Celular smartphone GO-CEL sm 16gb red 4g rojo'],
            ['marca_id' => '7', 'referencia' => 'Huawei - Celular Huawei Y7A 64GB + Memoria SD Card de 64GB'],
            ['marca_id' => '7', 'referencia' => 'Huawei - Celular Huawei Y9A 128GB con HMS'],
            ['marca_id' => '7', 'referencia' => 'Huawei - Celular Huawei Y6P con HMS 64GB'],
            ['marca_id' => '7', 'referencia' => 'Huawei - Celular Huawei Mate 30 Pro con HMS 256GB'],
            ['marca_id' => '7', 'referencia' => 'Huawei - Celular Huawei Y7a 64GB'],
            ['marca_id' => '7', 'referencia' => 'Huawei - Celular huawei y7p negro'],
            ['marca_id' => '7', 'referencia' => 'Huawei - Celular Huawei P40 128GB con HMS'],
            ['marca_id' => '7', 'referencia' => 'Celular Huawei P40 128GB con HMS'],
            ['marca_id' => '8', 'referencia' => 'Hyundai - Celular Hyundai e475 16gb dual sim cardo 3g dorado'],
            ['marca_id' => '8', 'referencia' => 'Hyundai - Celular Hyundai e475 16gb dual sim card 3g gris'],
            ['marca_id' => '8', 'referencia' => 'Hyundai - Celular Hyundai L553 16gb 4g + Microsd 32gb Azul'],
            ['marca_id' => '8', 'referencia' => 'Hyundai - Teléfono celular hyundai d265 dual sim 2g naranja'],
            ['marca_id' => '8', 'referencia' => 'Hyundai - Celular hyundai e475 16gb 3g gris (2 und) + parlan'],
            ['marca_id' => '8', 'referencia' => 'Hyundai - Celular hyundai e553 16gb 3g azul (2 und) + parlan'],
            ['marca_id' => '8', 'referencia' => 'Hyundai - Teléfono celular hyundai d265 dual sim 2g amarillo'],
            ['marca_id' => '8', 'referencia' => 'Hyundai - Celular Hyundai L553 16gb 4g + Microsd 32gb Rojo'],
            ['marca_id' => '8', 'referencia' => 'Hyundai - Teléfono celular hyundai d265 dual sim 2g verde'],
            ['marca_id' => '8', 'referencia' => 'Teléfono celular hyundai d265 dual sim 2g verde'],
            ['marca_id' => '9', 'referencia' => 'Infinix - Celular infinix note 8 128gb+6ram dual sim plata'],
            ['marca_id' => '9', 'referencia' => 'Infinix - Celular infinix note 8i 128gb+4ram dual sim negro'],
            ['marca_id' => '9', 'referencia' => 'Infinix - Celular infinix note 8 128gb+6ram dual sim azul'],
            ['marca_id' => '9', 'referencia' => 'Celular infinix note 8 128gb+6ram dual sim azul'],

        ];
        foreach ($referencias as $key => $value) {
            DB::table('referencias')->insert([
                'marca_id' => $value['marca_id'],
                'referencia' => $value['referencia'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
