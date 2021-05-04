<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_TipoPQR extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['tipo' => 'Petición', 'descripcion' => 'Puede presentar una solicitud respetuosa sobre cualquier tema de su interés o de interés general relacionado con nuestra empresa', 'url' => 'usuario-generarPQR', 'tiempos' => 15, 'sigla' => 'PQR'],
            ['tipo' => 'Queja', 'descripcion' => 'Puede presentar una solicitud respetuosa sobre cualquier tema de su interés o de interés general relacionado con nuestra empresa', 'url' => 'usuario-generarPQR', 'tiempos' => 15, 'sigla' => 'PQR'],
            ['tipo' => 'Reclamo', 'descripcion' => 'Puede presentar una solicitud respetuosa sobre cualquier tema de su interés o de interés general relacionado con nuestra empresa', 'url' => 'usuario-generarPQR', 'tiempos' => 15, 'sigla' => 'PQR'],
            ['tipo' => 'Concepto u opinión', 'descripcion' => 'Solicite una opinión, concepto o posición sobre un asunto', 'url' => 'usuario-generarConceptoUOpinion', 'tiempos' => 30, 'sigla' => 'CON'],
            ['tipo' => 'Solicitud sobre mis datos personales', 'descripcion' => 'Solicite rectificaciones, correcciones, suprimir y/o conocer los datos personales que se encuentran en nuestras bases de datos', 'url' => 'usuario-generarSolicitudDatos', 'tiempos' => 10, 'sigla' => 'SDP'],
            ['tipo' => 'Denuncia', 'descripcion' => 'Ponga en nuestro conocimiento una posible irregularidad o delito que haya conocido en nuestra empresa', 'url' => 'usuario-gererarDenuncia', 'tiempos' => 15, 'sigla' => 'DEN'],
            ['tipo' => 'Felicitación', 'descripcion' => '¿Quiere hacer un reconocimiento a nuestro trabajo o a uno de nuestros colaboradores? ¡Adelante!', 'url' => 'usuario-generarFelicitacion', 'tiempos' => 15, 'sigla' => 'FEL'],
            ['tipo' => 'Solicitud de documentos o información', 'descripcion' => 'Aquí podrá solicitar información o copias de documentos que reposan en nuestra entidad', 'url' => 'usuario-generarSolicitudDocumentos', 'tiempos' => 10, 'sigla' => 'INF'],
            ['tipo' => 'Sugerencia', 'descripcion' => 'Aquí puede darnos una ecomendación y ayudarnos a mejorar', 'url' => 'usuario-generarSugerencia', 'tiempos' => 15, 'sigla' => 'SUG'],
        ];
        foreach ($tipos as $key => $value) {
            DB::table('tipo_pqr')->insert([
                'tipo' => $value['tipo'],
                'descripcion' => $value['descripcion'],
                'url' => $value['url'],
                'tiempos' => $value['tiempos'],
                'sigla' => $value['sigla'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
