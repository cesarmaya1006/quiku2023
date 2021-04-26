<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Productos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = [
            ['categoria_id' => '1', 'producto' => 'Celulares y Smartphones'],
            ['categoria_id' => '1', 'producto' => 'iPhone'],
            ['categoria_id' => '1', 'producto' => 'Teléfonos fijos'],
            ['categoria_id' => '1', 'producto' => 'Smartwatch'],
            ['categoria_id' => '1', 'producto' => 'Smartbands'],
            ['categoria_id' => '1', 'producto' => 'Ver todo Wearables'],
            ['categoria_id' => '1', 'producto' => 'Forros y Carcasas'],
            ['categoria_id' => '1', 'producto' => 'Audífonos'],
            ['categoria_id' => '1', 'producto' => 'Baterías externas'],
            ['categoria_id' => '1', 'producto' => 'Tarjetas Micro SD'],
            ['categoria_id' => '1', 'producto' => 'Protectores de pantalla'],
            ['categoria_id' => '1', 'producto' => 'Cargadores y cables'],
            ['categoria_id' => '1', 'producto' => 'Soporte para celulares'],
            ['categoria_id' => '1', 'producto' => 'Otros Accesorios'],
            ['categoria_id' => '2', 'producto' => 'Televisores'],
            ['categoria_id' => '2', 'producto' => 'Streaming'],
            ['categoria_id' => '2', 'producto' => 'Proyectores y Video Beams'],
            ['categoria_id' => '2', 'producto' => 'Soportes'],
            ['categoria_id' => '2', 'producto' => 'Accesorios TV'],
            ['categoria_id' => '2', 'producto' => 'Barras de Sonido'],
            ['categoria_id' => '2', 'producto' => 'Teatros en casa'],
            ['categoria_id' => '2', 'producto' => 'Portátiles'],
            ['categoria_id' => '2', 'producto' => '2 en 1'],
            ['categoria_id' => '2', 'producto' => 'De Mesa'],
            ['categoria_id' => '2', 'producto' => 'Gaming'],
            ['categoria_id' => '2', 'producto' => 'Tablets'],
            ['categoria_id' => '2', 'producto' => 'Impresoras'],
            ['categoria_id' => '2', 'producto' => 'Tintas'],
            ['categoria_id' => '2', 'producto' => 'Monitores'],
            ['categoria_id' => '2', 'producto' => 'Software'],
            ['categoria_id' => '2', 'producto' => 'Routers y Conectividad'],
            ['categoria_id' => '2', 'producto' => 'Accesorios Computación'],
            ['categoria_id' => '2', 'producto' => 'Consolas'],
            ['categoria_id' => '2', 'producto' => 'Videojuegos'],
            ['categoria_id' => '2', 'producto' => 'Playstation'],
            ['categoria_id' => '2', 'producto' => 'Xbox'],
            ['categoria_id' => '2', 'producto' => 'Nintendo'],
            ['categoria_id' => '2', 'producto' => 'Accesorios Videojuegos'],
            ['categoria_id' => '2', 'producto' => 'Computadores gaming'],
            ['categoria_id' => '2', 'producto' => 'Audífonos Gaming'],
            ['categoria_id' => '2', 'producto' => 'Apple Watch'],
            ['categoria_id' => '2', 'producto' => 'Samsung Watch'],
            ['categoria_id' => '2', 'producto' => 'Huawei'],
            ['categoria_id' => '2', 'producto' => 'Xiaomi'],
            ['categoria_id' => '2', 'producto' => 'Cámaras Profesionales'],
            ['categoria_id' => '2', 'producto' => 'Cámaras Semiprofesionales'],
            ['categoria_id' => '2', 'producto' => 'Cámaras Digitales Compactas'],
            ['categoria_id' => '2', 'producto' => 'Cámaras Instantáneas'],
            ['categoria_id' => '2', 'producto' => 'Cámaras Deportivas'],
            ['categoria_id' => '2', 'producto' => 'Drones'],
            ['categoria_id' => '2', 'producto' => 'Cámaras de Video'],
            ['categoria_id' => '2', 'producto' => 'Accesorios Fotografía'],
            ['categoria_id' => '2', 'producto' => 'Impresoras de fotos'],
            ['categoria_id' => '2', 'producto' => 'Bluetooth'],
            ['categoria_id' => '2', 'producto' => 'Inteligentes'],
            ['categoria_id' => '2', 'producto' => 'de Fiesta'],
            ['categoria_id' => '2', 'producto' => 'Portátiles'],
            ['categoria_id' => '2', 'producto' => 'Equipos de Sonido'],
            ['categoria_id' => '2', 'producto' => 'Barras de Sonido'],
            ['categoria_id' => '2', 'producto' => 'Teatros en casa'],
            ['categoria_id' => '2', 'producto' => 'Sonido para carros'],
            ['categoria_id' => '2', 'producto' => 'Bluetooth'],
            ['categoria_id' => '2', 'producto' => 'Con cable'],
            ['categoria_id' => '2', 'producto' => 'Deportivos'],
            ['categoria_id' => '2', 'producto' => 'Gaming'],
            ['categoria_id' => '2', 'producto' => 'Cámaras inteligentes'],
            ['categoria_id' => '2', 'producto' => 'Asistente de voz'],
            ['categoria_id' => '2', 'producto' => 'Iluminación'],
            ['categoria_id' => '2', 'producto' => 'Switches y plugs'],
            ['categoria_id' => '2', 'producto' => 'Electrodomésticos inteligentes'],
            ['categoria_id' => '2', 'producto' => 'Cerraduras'],
            ['categoria_id' => '2', 'producto' => 'Otros dispositivos'],
            ['categoria_id' => '2', 'producto' => 'Drones'],
            ['categoria_id' => '2', 'producto' => 'Routers y Conectividad'],


        ];
        foreach ($productos as $key => $value) {
            DB::table('productos')->insert([
                'categoria_id' => $value['categoria_id'],
                'producto' => $value['producto'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
