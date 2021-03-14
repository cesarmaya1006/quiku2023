<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Procesos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $procesos = [
            ['estado_notifi' => 'Notificado', 'fecha_notifi' => '2019-12-06', 'fecha_conoci_juridi' => '2019-05-22', 'codigo_unico_proceso' => '11001310501220170075400', 'codigo_unico_proceso_act' => '11001310501220170075400', 'fecha_admin' => '2018-01-25', 'fecha_radicacion' => '2019-07-02', 'juzgado_id' => '1160', 'cuantia' => '35000000', 'tipo_proceso_id' => '2', 'estado_proceso_id' => '1', 'etapa_proceso_id' => '6', 'riesgo_perdida_id' => '2', 'terminacion_anormal' => 'NULL'],
            ['estado_notifi' => 'Notificado', 'fecha_notifi' => '2019-10-05', 'fecha_conoci_juridi' => '2019-10-05', 'codigo_unico_proceso' => '11001360503620190004600', 'codigo_unico_proceso_act' => '11001310503620190004600', 'fecha_admin' => '2019-04-23', 'fecha_radicacion' => '2019-01-22', 'juzgado_id' => '1184', 'cuantia' => '50000', 'tipo_proceso_id' => '2', 'estado_proceso_id' => '2', 'etapa_proceso_id' => '7', 'riesgo_perdida_id' => '2', 'terminacion_anormal' => '1'],

        ];
        foreach ($procesos as $item) {
            DB::table('procesos')->insert([
                'estado_notifi' => utf8_decode(utf8_encode($item['estado_notifi'])),
                'fecha_notifi' => $item['fecha_notifi'],
                'fecha_conoci_juridi' => $item['fecha_conoci_juridi'],
                'codigo_unico_proceso' => utf8_decode(utf8_encode($item['codigo_unico_proceso'])),
                'codigo_unico_proceso_act' => utf8_decode(utf8_encode($item['codigo_unico_proceso_act'])),
                'fecha_admin' => $item['fecha_admin'],
                'fecha_radicacion' => $item['fecha_radicacion'],
                'juzgado_id' => $item['juzgado_id'],
                'cuantia' => $item['cuantia'],
                'tipo_proceso_id' => $item['tipo_proceso_id'],
                'estado_proceso_id' => $item['estado_proceso_id'],
                'etapa_proceso_id' => $item['etapa_proceso_id'],
                'riesgo_perdida_id' => $item['riesgo_perdida_id'],
                'terminacion_anormal' => $item['terminacion_anormal'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        $procesos = [
            ['estado_notifi' => 'Notificado', 'fecha_notifi' => '2020-04-05', 'fecha_conoci_juridi' => '2020-04-05', 'codigo_unico_proceso' => '47001310500320200004900', 'codigo_unico_proceso_act' => '47001310500320200004900', 'fecha_admin' => '2020-07-21', 'juzgado_id' => '3596', 'cuantia' => '50000', 'tipo_proceso_id' => '2', 'estado_proceso_id' => '1', 'etapa_proceso_id' => '2', 'riesgo_perdida_id' => '2', 'terminacion_anormal' => 'NULL'],


        ];
        foreach ($procesos as $item) {
            DB::table('procesos')->insert([
                'estado_notifi' => utf8_decode(utf8_encode($item['estado_notifi'])),
                'fecha_notifi' => $item['fecha_notifi'],
                'fecha_conoci_juridi' => $item['fecha_conoci_juridi'],
                'codigo_unico_proceso' => utf8_decode(utf8_encode($item['codigo_unico_proceso'])),
                'codigo_unico_proceso_act' => utf8_decode(utf8_encode($item['codigo_unico_proceso_act'])),
                'fecha_admin' => $item['fecha_admin'],
                'juzgado_id' => $item['juzgado_id'],
                'cuantia' => $item['cuantia'],
                'tipo_proceso_id' => $item['tipo_proceso_id'],
                'estado_proceso_id' => $item['estado_proceso_id'],
                'etapa_proceso_id' => $item['etapa_proceso_id'],
                'riesgo_perdida_id' => $item['riesgo_perdida_id'],
                'terminacion_anormal' => $item['terminacion_anormal'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        $procesos = [
            ['estado_notifi' => 'Sin Notificar', 'codigo_unico_proceso' => '47001310500520190031700', 'codigo_unico_proceso_act' => '47001310500520190031700', 'juzgado_id' => '3598', 'cuantia' => '0', 'tipo_proceso_id' => '2', 'estado_proceso_id' => '1', 'etapa_proceso_id' => '1', 'riesgo_perdida_id' => '1', 'terminacion_anormal' => 'NULL'],


        ];
        foreach ($procesos as $item) {
            DB::table('procesos')->insert([
                'estado_notifi' => utf8_decode(utf8_encode($item['estado_notifi'])),
                'codigo_unico_proceso' => utf8_decode(utf8_encode($item['codigo_unico_proceso'])),
                'codigo_unico_proceso_act' => utf8_decode(utf8_encode($item['codigo_unico_proceso_act'])),
                'juzgado_id' => $item['juzgado_id'],
                'cuantia' => $item['cuantia'],
                'tipo_proceso_id' => $item['tipo_proceso_id'],
                'estado_proceso_id' => $item['estado_proceso_id'],
                'etapa_proceso_id' => $item['etapa_proceso_id'],
                'riesgo_perdida_id' => $item['riesgo_perdida_id'],
                'terminacion_anormal' => $item['terminacion_anormal'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
