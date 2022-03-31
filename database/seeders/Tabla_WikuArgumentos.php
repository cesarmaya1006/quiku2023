<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_WikuArgumentos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['fecha' => '2022/03/31','wikuautores_id' => '1','texto' => '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 15px;">Cada cierto tiempo, un joven o un grupo de jóvenes del mundo industrializado comete una atrocidad que les cuesta la vida a sus compañeros y sus maestros del colegio, o a los desafortunados transeúntes de un centro comercial. Y cada vez que ello ocurre aparecen en los medios de comunicación los sospechosos habituales: el rock pesado, las&nbsp;</span><a href="https://www.ejemplos.co/historietas/" style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(0, 0, 0); border-bottom: 0px; font-family: &quot;Open Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 15px;">historietas</a><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 15px;">&nbsp;y, en especial, los videojuegos. Se los acusa de contaminar las mentes de los niños con violencia, de expresar “antivalores” y de ser una influencia nefasta en la sociedad contemporánea.</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 15px;"><br><br>Fuente:&nbsp;<a href="https://www.ejemplos.co/10-ejemplos-de-argumentacion/#ixzz7P8LudUYx" style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(0, 51, 153); border-bottom: 0px;">https://www.ejemplos.co/10-ejemplos-de-argumentacion/#ixzz7P8LudUYx</a></span><br></p>','descripcion' => 'Los videojuegos: un nuevo espejo en que mirar nuestra cultura','wikutemaespecifico_id' => 1,'destacado' => 0,'publico' => 1],
            ['fecha' => '2022/03/31','wikuautores_id' => '1','texto' => '<p style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 15px;">Mucho tiempo ha transcurrido desde que, en el marco de la Revolución Francesa de 1789, la Asamblea Nacional Constituyente francesa aprobó la Declaración de los Derechos del Hombre y el Ciudadano, documento que servirá de base para la idea contemporánea de los derechos fundamentales, inalienables e irrenunciables que se le otorgan a todo ser humano al nacer. Y sin embargo, en pleno siglo XXI, son muchos los regímenes y las situaciones en las que el irrespeto y la violación de estos derechos básicos ocurren de manera evidente y permanecen impunes.</p><p style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 15px;">En Occidente solemos jactarnos de haber “inventado” los derechos humanos modernos, ignorando su larga fila de antecedentes en la Antigüedad. También solemos invocarlos para criticar a los gobiernos más despiadados de África y el Medio Oriente.</p>','descripcion' => 'Los derechos humanos universales: una pieza clave para el futuro','wikutemaespecifico_id' => 10,'destacado' => 0,'publico' => 1],
            ['fecha' => '2022/03/31','wikuautores_id' => '1','texto' => '<p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 15px;">Actualmente, los paquetes de cigarrillos contienen mensajes alertando sobre los posibles daños a la salud que produce su consumo, y se acompañan de fotografías explícitas o sugerentes que complementan con un impacto visual y emocional las advertencias médicas. Esta argumentación tiene como finalidad persuadir al consumidor de abandonar el hábito del tabaquismo.</span><br></p>','descripcion' => 'Propagandas contra el cigarrillo','wikutemaespecifico_id' => 4,'destacado' => 0,'publico' => 1],
        ];
        foreach ($tipos as $key => $value) {
            DB::table('wikuargumentos')->insert([
                'fecha' => $value['fecha'],
                'wikuautores_id' => $value['wikuautores_id'],
                'texto' => $value['texto'],
                'descripcion' => $value['descripcion'],
                'wikutemaespecifico_id' => $value['wikutemaespecifico_id'],
                'destacado' => $value['destacado'],
                'publico' => $value['publico'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
