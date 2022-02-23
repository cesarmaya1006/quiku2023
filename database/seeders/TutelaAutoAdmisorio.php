<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutelaAutoAdmisorio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auto_admisorio')->insert([
            'empleado_rigistro_id' => '6',
            'empleado_asignado_id' => '6',
            'prioridad_id' => '2',
            'fecha_radicado' => '2022-02-20 18:23:50',
            'radicado' => 'PruebaA001',
            'jurisdiccion' => 'ORDINARIA',
            'juzgado' => 'JUZGADO 002 LABORAL DE IBAGUÉ',
            'departamento' => 'TOLIMA',
            'municipio' => 'IBAGUÉ',
            'fecha_notificacion' => '2022-02-20 18:21:00',
            'nombre_juez' => 'BLANCA ALEXANDRA SIERRA',
            'direccion_juez' => 'Carrera 2 # 8-90 - Palacio De Justicia',
            'telefono_juez' => '8-2610060',
            'correo_juez' => 'quiku2021@gmail.com',
            'dias_termino' => '15',
            'titulo_admisorio' => 'Archivo Auto',
            'descripcion_admisorio' => 'Descripcion 1',
            'url_admisorio' => '1645399406-EJEMPLO DE TUTELA.pdf',
            'extension_admisorio' => 'pdf',
            'peso_admisorio' => '9.886',
            'titulo_tutela' => 'Archivo Auto',
            'descripcion_tutela' => 'Descripcion 1',
            'url_tutela' => '1645399406-EJEMPLO DE TUTELA.pdf',
            'extension_tutela' => 'pdf',
            'peso_tutela' => '9.886',
            'medida_cautelar' => 'false',
            'fecha_limite' => '2022-03-07 18:21:00',
            'estadostutela_id' => '3',
            'estado_asignacion' => '1',
            'cantidad_hechos' => '1',
            'cantidad_pretensiones' => '1',
            'estado_creacion' => '1',
            'created_at' => '2022-02-20 18:23:26',
            'created_at' => '2022-02-20 18:23:59',
        ]);
    }
}
