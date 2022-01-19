<?php

namespace App\Http\Controllers\Intranet\Email;

use App\Http\Controllers\Controller;

use App\Models\Empleados\Empleado;
use App\Models\PQR\Aclaracion;
use App\Models\PQR\PQR;
use App\Models\PQR\Recurso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pqrRadicadaPdf($id)
    {
        $pqr_radicada = PQR::findOrFail($id);
        // $imagen = public_path('imagenes\sistema\logo_mgl.png');
        $imagen = asset('imagenes/sistema/logo_mgl.png'); //url_servidor
        $fecha = $pqr_radicada->fecha_generacion;
        $num_radicado = $pqr_radicada->radicado;
        if ($pqr_radicada->persona_id != null) {
            $nombre = $pqr_radicada->persona->nombre1 . ' ' . $pqr_radicada->persona->nombre2 . ' ' . $pqr_radicada->persona->apellido1 . ' ' . $pqr_radicada->persona->apellido2;
            $email = $pqr_radicada->persona->email;
            $identificacion = $pqr_radicada->persona->identificacion;
            $tipo_doc = $pqr_radicada->persona->tipos_docu->tipo_id;
        } else {
            $nombre = $pqr_radicada->empresa->razon_social;
            $empresa = $pqr_radicada->empresa->razon_social;
            $representante = $pqr_radicada->empresa->representante->nombre1 . ' ' . $pqr_radicada->empresa->representante->apellido1;
            $email = $pqr_radicada->empresa->email;
            $identificacion = $pqr_radicada->empresa->identificacion;
            $tipo_doc = $pqr_radicada->empresa->tipos_docu->tipo_id;
        }
        $tipo_pqr_id = $pqr_radicada->tipo_pqr_id;
        $pdf = PDF::loadView('intranet.emails.pqr_radicada', compact('pqr_radicada', 'imagen', 'nombre', 'tipo_doc', 'identificacion', 'email', 'num_radicado', 'fecha', 'tipo_pqr_id'));

        return $pdf->download('PQR Radicada.pdf');
    }

    public function aclaracionPdf($id)
    {
        $aclaracion = Aclaracion::findOrFail($id);
        // $imagen = public_path('imagenes\sistema\logo_mgl.png');
        // $firma = public_path('imagenes\sistema\firma.png');
        $imagen = asset('imagenes/sistema/logo_mgl.png'); //url_servidor
        $firma = asset('imagenes/sistema/firma.png'); //url_servidor
        $fecha = $aclaracion->fecha_radicado;
        $num_radicado = $aclaracion->radicado;
        if ($aclaracion->peticion->pqr->persona_id != null) {
            $nombre = $aclaracion->peticion->pqr->persona->nombre1 . ' ' . $aclaracion->peticion->pqr->persona->nombre2 . ' ' . $aclaracion->peticion->pqr->persona->apellido1 . ' ' . $aclaracion->peticion->pqr->persona->apellido2;
            $email = $aclaracion->peticion->pqr->persona->email;
            $identificacion = $aclaracion->peticion->pqr->persona->identificacion;
            $tipo_doc = $aclaracion->peticion->pqr->persona->tipos_docu->tipo_id;
        } else {
            $nombre = $aclaracion->peticion->pqr->empresa->razon_social;
            $empresa = $aclaracion->peticion->pqr->empresa->razon_social;
            $representante = $aclaracion->peticion->pqr->empresa->representante->nombre1 . ' ' . $aclaracion->peticion->pqr->empresa->representante->apellido1;
            $email = $aclaracion->peticion->pqr->empresa->email;
            $identificacion = $aclaracion->peticion->pqr->empresa->identificacion;
            $tipo_doc = $aclaracion->peticion->pqr->empresa->tipos_docu->tipo_id;
        }
        $pdf = PDF::loadView('intranet.emails.aclaracion', compact('aclaracion', 'imagen', 'nombre', 'tipo_doc', 'identificacion', 'email', 'num_radicado', 'fecha', 'firma'));
        return $pdf->download('Aclaracion Radicada.pdf');
    }

    public function constancia_aclaracionPdf($id)
    {
        $aclaracion = Aclaracion::findOrFail($id);
        // $imagen = public_path('imagenes\sistema\logo_mgl.png');
        $imagen = asset('imagenes/sistema/logo_mgl.png'); //url_servidor
        $fecha = $aclaracion->fecha_radicado;
        $num_radicado = $aclaracion->radicado;
        if ($aclaracion->peticion->pqr->persona_id != null) {
            $nombre = $aclaracion->peticion->pqr->persona->nombre1 . ' ' . $aclaracion->peticion->pqr->persona->nombre2 . ' ' . $aclaracion->peticion->pqr->persona->apellido1 . ' ' . $aclaracion->peticion->pqr->persona->apellido2;
            $email = $aclaracion->peticion->pqr->persona->email;
            $identificacion = $aclaracion->peticion->pqr->persona->identificacion;
            $tipo_doc = $aclaracion->peticion->pqr->persona->tipos_docu->tipo_id;
        } else {
            $nombre = $aclaracion->peticion->pqr->empresa->razon_social;
            $empresa = $aclaracion->peticion->pqr->empresa->razon_social;
            $representante = $aclaracion->peticion->pqr->empresa->representante->nombre1 . ' ' . $aclaracion->peticion->pqr->empresa->representante->apellido1;
            $email = $aclaracion->peticion->pqr->empresa->email;
            $identificacion = $aclaracion->peticion->pqr->empresa->identificacion;
            $tipo_doc = $aclaracion->peticion->pqr->empresa->tipos_docu->tipo_id;
        }
        $pdf = PDF::loadView('intranet.emails.contancia_aclaracion', compact('aclaracion', 'imagen', 'nombre', 'tipo_doc', 'identificacion', 'email', 'num_radicado', 'fecha',));
        return $pdf->download('Constancia de Aclaracion.pdf');
    }

    public function prorrogaPdf($id)
    {
        $pqr = PQR::findOrFail($id);
        // $imagen = public_path('imagenes\sistema\logo_mgl.png');
        // $firma = public_path('imagenes\sistema\firma.png');
        $imagen = asset('imagenes/sistema/logo_mgl.png'); //url_servidor
        $firma = asset('imagenes/sistema/firma.png'); //url_servidor
        $fecha = date('Y-m-d H:i:s');
        $num_radicado = $pqr->radicado;
        $cant_dias = $pqr->prorroga_dias;
        if ($pqr->persona_id != null) {
            $nombre = $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2;
            $email = $pqr->persona->email;
            $identificacion = $pqr->persona->identificacion;
            $tipo_doc = $pqr->persona->tipos_docu->tipo_id;
        } else {
            $nombre = $pqr->empresa->razon_social;
            $empresa = $pqr->empresa->razon_social;
            $representante = $pqr->empresa->representante->nombre1 . ' ' . $pqr->empresa->representante->apellido1;
            $email = $pqr->empresa->email;
            $identificacion = $pqr->empresa->identificacion;
            $tipo_doc = $pqr->empresa->tipos_docu->tipo_id;
        }
        $empleado = Empleado::findOrFail('5');
        $pdf = PDF::loadView('intranet.emails.prorroga', compact('pqr', 'imagen', 'nombre', 'tipo_doc', 'identificacion', 'email', 'num_radicado', 'fecha', 'cant_dias', 'empleado', 'firma'));
        return $pdf->download('Prorroga.pdf');
    }

    public function recursoPdf($id)
    {
        $recurso = Recurso::findOrFail($id);
        // $imagen = public_path('imagenes\sistema\logo_mgl.png');
        $imagen = asset('imagenes/sistema/logo_mgl.png'); //url_servidor
        $fecha = date('Y-m-d H:i:s');
        $num_radicado = $recurso->radicado;
        if ($recurso->persona_id != null) {
            $nombre = $recurso->persona->nombre1 . ' ' . $recurso->persona->nombre2 . ' ' . $recurso->persona->apellido1 . ' ' . $recurso->persona->apellido2;
            $email = $recurso->persona->email;
            $identificacion = $recurso->persona->identificacion;
            $tipo_doc = $recurso->persona->tipos_docu->tipo_id;
        } else {
            $nombre = $recurso->empresa->razon_social;
            $empresa = $recurso->empresa->razon_social;
            $representante = $recurso->empresa->representante->nombre1 . ' ' . $recurso->empresa->representante->apellido1;
            $email = $recurso->empresa->email;
            $identificacion = $recurso->empresa->identificacion;
            $tipo_doc = $recurso->empresa->tipos_docu->tipo_id;
        }
        $pdf = PDF::loadView('intranet.emails.constancia_recurso', compact('recurso', 'imagen', 'nombre', 'tipo_doc', 'identificacion', 'email', 'num_radicado', 'fecha'));
        return $pdf->download('Constancia Recurso.pdf');
    }
}
