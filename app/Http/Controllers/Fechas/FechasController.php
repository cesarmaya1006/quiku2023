<?php

namespace App\Http\Controllers\Fechas;

use Illuminate\Http\Request;
use App\Models\Admin\DiasFestivos;
use App\Http\Controllers\Controller;

class FechasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function festivos($diasLimite, $diaGeneracion)
    {
        $festivos = DiasFestivos::get();
        $validacion = 0;
        $iteradorDias = $diasLimite + 1;
        $totalDias = 0;
        $diaRadicacion = $diaGeneracion;
        while($validacion == 0){
            $diaComparar = date("Y-m-d", strtotime("$diaRadicacion + $totalDias days"));
            $festivo = 0;
            if(date("l", strtotime("$diaComparar")) == "Saturday" || date("l", strtotime("$diaComparar")) == "Sunday" ){
                // $diasFin[] = date("Y-m-d", strtotime("$diaComparar"));
            }else{
                for ($i=0; $i < sizeof($festivos); $i++) { 
                    if($festivos[$i]['fecha'] == $diaComparar){
                        $festivo = 1;
                    }
                }
                if(!$festivo){
                    $iteradorDias--;
                }
            }
            $totalDias++;
            if($iteradorDias == 0){
                $validacion = 1;
            }
        }
        $totalDias = $totalDias - 1;
        return $totalDias;
    }
}
