<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_SubMotivos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_motivos = [
            ['motivo_id' => '2', 'sub_motivo' => 'Que se me devuelva el dinero y yo devolver el producto o servicio', 'dias_gestion' => 10],
            ['motivo_id' => '2', 'sub_motivo' => 'Otra', 'dias_gestion' => 10],
            ['motivo_id' => '3', 'sub_motivo' => 'Que se tomen medidas correctivas', 'dias_gestion' => 10],
            ['motivo_id' => '3', 'sub_motivo' => 'Que se me repare o se me ofrezcan disculpas', 'dias_gestion' => 10],
            ['motivo_id' => '3', 'sub_motivo' => 'Otra', 'dias_gestion' => 10],
            ['motivo_id' => '4', 'sub_motivo' => 'Que se tomen medidas correctivas', 'dias_gestion' => 10],
            ['motivo_id' => '4', 'sub_motivo' => 'Que se me repare o se me ofrezcan disculpas', 'dias_gestion' => 10],
            ['motivo_id' => '4', 'sub_motivo' => 'Otra', 'dias_gestion' => 10],
            ['motivo_id' => '5', 'sub_motivo' => 'Que se tomen medidas correctivas', 'dias_gestion' => 10],
            ['motivo_id' => '5', 'sub_motivo' => 'Que se me repare o se me ofrezcan disculpas', 'dias_gestion' => 10],
            ['motivo_id' => '5', 'sub_motivo' => 'Otra', 'dias_gestion' => 10],
            ['motivo_id' => '6', 'sub_motivo' => 'Que se repare el bien', 'dias_gestion' => 10],
            ['motivo_id' => '6', 'sub_motivo' => 'Que se cambie el bien por uno nuevo, idéntico o de similares características al adquirido', 'dias_gestion' => 10],
            ['motivo_id' => '6', 'sub_motivo' => 'La devolución de mi dinero', 'dias_gestion' => 10],
            ['motivo_id' => '6', 'sub_motivo' => 'Otra', 'dias_gestion' => 10],
            ['motivo_id' => '7', 'sub_motivo' => 'Mantener las condiciones ofertadas o informadas', 'dias_gestion' => 10],
            ['motivo_id' => '7', 'sub_motivo' => 'Corregir la publicidad', 'dias_gestion' => 10],
            ['motivo_id' => '7', 'sub_motivo' => 'Otra', 'dias_gestion' => 10],
            ['motivo_id' => '8', 'sub_motivo' => 'Que se me indique cuándo se entregará mi producto o servicio', 'dias_gestion' => 10],
            ['motivo_id' => '8', 'sub_motivo' => 'Que se me entregue mi producto o servicio en el menor tiempo posible', 'dias_gestion' => 10],
            ['motivo_id' => '8', 'sub_motivo' => 'Otra', 'dias_gestion' => 10],
            ['motivo_id' => '9', 'sub_motivo' => 'Devolución del mayor valor pagado por el bien o servicio', 'dias_gestion' => 10],
            ['motivo_id' => '9', 'sub_motivo' => 'Que se me entregue la factura del producto o servicio adquirido', 'dias_gestion' => 10],
            ['motivo_id' => '9', 'sub_motivo' => 'Que se corrija la factura del producto o servicio adquirido', 'dias_gestion' => 10],
            ['motivo_id' => '9', 'sub_motivo' => 'Otra', 'dias_gestion' => 10],

        ];
        foreach ($sub_motivos as $key => $value) {
            DB::table('motivo_sub')->insert([
                'motivo_id' => $value['motivo_id'],
                'sub_motivo' => $value['sub_motivo'],
                'dias_gestion' => $value['dias_gestion'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
