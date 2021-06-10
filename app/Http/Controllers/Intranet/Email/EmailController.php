<?php

namespace App\Http\Controllers\Intranet\Email;

use App\Http\Controllers\Controller;
use App\Models\ConceptosUOpiniones\ConceptoUOpinion;
use App\Models\Denuncias\Denuncia;
use App\Models\Empleados\Empleado;
use App\Models\Felicitaciones\Felicitacion;
use App\Models\PQR\Aclaracion;
use App\Models\PQR\PQR;
use App\Models\PQR\Recurso;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use App\Models\Sugerencias\Sugerencia;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function Pqr_Radicada_pdf_email($id)
    {
        $pqr_sel = PQR::findOrFail($id);
        if ($pqr_sel->persona_id != null) {
            $para = $pqr_sel->persona->email;
        } else {
            $para = $pqr_sel->empresa->email;
        }
        // -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        //produccion Pruebas
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Your name <info@address.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $mensaje = '<html lang="es">' . "\r\n";
        $mensaje .= '<head>' . "\r\n";
        $mensaje .= '<meta charset="utf-8">' . "\r\n";
        $mensaje .= '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\r\n";
        $mensaje .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">' . "\r\n";
        $mensaje .= '<title>Sistema QUIKU</title>' . "\r\n";
        $mensaje .= '</head>' . "\r\n";
        $mensaje .= '<body>' . "\r\n";
        $mensaje .= '<div class="row">' . "\r\n";
        $mensaje .= '<div class="col-12">' . "\r\n";
        $mensaje .= '<h1>Sistema QUIKU</h1>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<p>Estimado Usuario.</p>' . "\r\n";
        $mensaje .= '<p>Nuestro sistema ha detectado que se radico una nueva PQR.</p>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<a href="' . route('pqr_radicada_download', ['id' => $id]) . '" target="_blank" rel="noopener noreferrer">Resumen Radicado</a>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<p>lo invitamos a ingresasr a nuestro sistema.</p>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<a href="' . route('index') . '" target="_blank" rel="noopener noreferrer">' . route('index') . '</a>' . "\r\n";
        $mensaje .= '</div>' . "\r\n";
        $mensaje .= '</div>' . "\r\n";
        $mensaje .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>' . "\r\n";

        $mensaje .= '</body>' . "\r\n";
        $mensaje .= '</html>' . "\r\n";
        //$para = 'jgmedina73@gmail.com';
        $titulo = 'Registro plataforma Quiku';
        mail($para, $titulo, $mensaje, $headers);
        // -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    }
    public static function Pqr_Radicada_pdf($id)
    {
        $pqr_sel = PQR::findOrFail($id);
        $tipo_pqr_id = $pqr_sel->tipo_pqr_id;
        $contenido = '';
        $num = 0;

        switch ($tipo_pqr_id) {
            case 1:
                $pqr = PQR::findOrFail($id);
                $contenido .= '<h4>Peticion</h4>';
                $contenido .= '<p>Lugar de adquisición del producto o servicio: ' . $pqr->adquisicion . '<p>';
                $contenido .= '<p>¿Su PQR es sobre un producto o servicio?: ' . $pqr->tipo . '<p>';
                $contenido .= '<p>Referencia: ' . $pqr->referencia_id . '<p>';
                $contenido .= '<p>No. Factura: ' . $pqr->factura . '<p>';
                $contenido .= '<p>Fecha de factura: ' . $pqr->fecha_factura . '<p>';
                $contenido .= '<p>Tipo de servicio: ' . $pqr->servicio_id . '<p>';
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Motivo: ' . $peticion->motivo->sub_motivo . '</h4>';
                    // $contenido .= '<p>Sub - Categoría Motivo: ' . $peticion->motivo->sub_motivo . '<p>';
                    foreach ($peticion->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                    $contenido .= '<p>Justificación: ' . $peticion->justificacion . '<p>';
                }
                break;
            case 2:
                $pqr = PQR::findOrFail($id);
                $contenido .= '<h4>Queja</h4>';
                $contenido .= '<p>Lugar de adquisición del producto o servicio: ' . $pqr->adquisicion . '<p>';
                $contenido .= '<p>¿Su PQR es sobre un producto o servicio?: ' . $pqr->tipo . '<p>';
                $contenido .= '<p>Referencia: ' . $pqr->referencia_id . '<p>';
                $contenido .= '<p>No. Factura: ' . $pqr->factura . '<p>';
                $contenido .= '<p>Fecha de factura: ' . $pqr->fecha_factura . '<p>';
                $contenido .= '<p>Tipo de servicio: ' . $pqr->servicio_id . '<p>';
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Motivo: ' . $peticion->motivo->sub_motivo . '</h4>';
                    // $contenido .= '<p>Sub - Categoría Motivo: ' . $peticion->motivo->sub_motivo . '<p>';
                    foreach ($peticion->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                    $contenido .= '<p>Justificación: ' . $peticion->justificacion . '<p>';
                }
                break;
            case 3:
                $pqr = PQR::findOrFail($id);
                $contenido .= '<h4>Reclamo</h4>';
                $contenido .= '<p>Lugar de adquisición del producto o servicio: ' . $pqr->adquisicion . '<p>';
                $contenido .= '<p>¿Su PQR es sobre un producto o servicio?: ' . $pqr->tipo . '<p>';
                $contenido .= '<p>Referencia: ' . $pqr->referencia_id . '<p>';
                $contenido .= '<p>No. Factura: ' . $pqr->factura . '<p>';
                $contenido .= '<p>Fecha de factura: ' . $pqr->fecha_factura . '<p>';
                $contenido .= '<p>Tipo de servicio: ' . $pqr->servicio_id . '<p>';
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Motivo: ' . $peticion->motivo->sub_motivo . '</h4>';
                    // $contenido .= '<p>Sub - Categoría Motivo: ' . $peticion->motivo->sub_motivo . '<p>';
                    foreach ($peticion->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                    $contenido .= '<p>Justificación: ' . $peticion->justificacion . '<p>';
                }
                break;
            case 4:
                $pqr = ConceptoUOpinion::findOrFail($id);
                foreach ($pqr->consultas as $concepto) {
                    $num++;
                    $contenido .= '<h4>Concepto u opinion #' . $num . '</h4>';
                    $contenido .= '<p>Consulta:' . $concepto->consulta . '<p>';
                    foreach ($concepto->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                }
                break;
            case 5:
                $pqr = SolicitudDatos::findOrFail($id);
                foreach ($pqr->solicitudes as $solicitud) {
                    $num++;
                    $contenido .= '<h4>Solicitud #' . $num . '</h4>';
                    $contenido .= '<p>Tipo de solicitud: ' . $solicitud->tiposolicitud . '<p>';
                    $contenido .= '<p>Datos personales objeto de la solicitud: ' . $solicitud->datossolicitud . '<p>';
                    $contenido .= '<p>Descripción de la solicitud: ' . $solicitud->descripcionsolicitud . '<p>';
                }
                break;

            case 6:
                $pqr = Denuncia::findOrFail($id);
                $contenido .= '<h4>Denuncia</h4>';
                $contenido .= '<p>Tipo de solicitud: ' . $pqr->solicitud . '</p>';
                foreach ($pqr->hechos as $hecho) {
                    $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                }
                break;
            case 7:
                $pqr = Felicitacion::findOrFail($id);
                $contenido .= '<h4>Felicitacion</h4>';
                foreach ($pqr->hechos as $hecho) {
                    $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                }
                if ($pqr->sede_id) {
                    $contenido .= '<p>Sede: ' . $pqr->sede_id . '</p>';
                }
                $contenido .= '<p>Nombre de funcionario: ' . $pqr->nombre_funcionario . '</p>';
                $contenido .= '<p>Escriba sus felicitaciones: ' . $pqr->felicitacion . '</p>';
                break;

            case 8:
                $pqr = SolicitudDocInfo::findOrFail($id);
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Petición #' . $num . '</h4>';
                    $contenido .= '<p>Tipo de petición: ' . $peticion->peticion . '<p>';
                    $contenido .= '<p>Identifique el documento o información requerida: ' . $peticion->indentifiquedocinfo . '<p>';
                    $contenido .= '<p>Justificaciones de su solicitud: ' . $peticion->justificacion . '<p>';
                }
                break;

            default:
                $pqr = Sugerencia::findOrFail($id);
                $contenido .= '<h4>Sugerencia</h4>';
                foreach ($pqr->hechos as $hecho) {
                    $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                }
                $contenido .= '<p>Escriba su sugerencia: ' . $pqr->sugerencia . '</p>';
                break;
        }
        $anexos = '';
        if ($pqr->peticiones->anexos->count() > 0) {
            foreach ($pqr->peticiones->anexos as $anexo) {
                $anexos .= '<li>';
                $anexos .= '<a href="' . asset('documentos/pqr/' . $anexo->url) . '" target="_blank"';
                $anexos .= 'rel="noopener noreferrer">';
                $anexos .= '<p>{{ $anexo->titulo }}</p>';
                $anexos .= '</a>';
                $anexos .= '</li>';
            }
        } else {
            $anexos = '';
        }
        $imagen = asset('imagenes/sistema/icono_sistema.png');

        if ($pqr->persona_id != null) {
            $data = [
                'nombre' => $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2,
                'correo' => $pqr->persona->email,
                'telefono' => $pqr->persona->telefono_celu,
                'tipo_doc' => $pqr->persona->tipos_docu->tipo_id,
                'identificacion' => $pqr->persona->identificacion,
                'fecha' => $pqr->created_at,
                'num_radicado' => $pqr->radicado,
                'contenido' => $contenido,
                'anexos' => $anexos,
                'imagen' => $imagen,
            ];
        } else {
            $data = [
                'nombre' => $pqr->empresa->razon_social,
                'correo' => $pqr->empresa->email,
                'telefono' => $pqr->empresa->telefono_celu,
                'tipo_doc' => $pqr->empresa->tipos_docu->tipo_id,
                'identificacion' => $pqr->empresa->identificacion,
                'fecha' => $pqr->created_at,
                'num_radicado' => $pqr->radicado,
                'contenido' => $contenido,
                'anexos' => $anexos,
                'imagen' => $imagen,
            ];
        }

        $pdf = PDF::loadView('intranet.emails.pqr_radicada', $data);
        return $pdf->download('PQR Radicada.pdf');
    }

    public function mensajepqr_radicada($id)
    {
        $mensaje = '<html lang="es">' . "\r\n";
        $mensaje .= '<head>' . "\r\n";
        $mensaje .= '<meta charset="utf-8">' . "\r\n";
        $mensaje .= '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\r\n";
        $mensaje .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">' . "\r\n";
        $mensaje .= '<title>Sistema QUIKU</title>' . "\r\n";
        $mensaje .= '</head>' . "\r\n";
        $mensaje .= '<body>' . "\r\n";
        $mensaje .= '<div class="row">' . "\r\n";
        $mensaje .= '<div class="col-12">' . "\r\n";
        $mensaje .= '<h1>Sistema QUIKU</h1>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<p>Estimado Usuario.</p>' . "\r\n";
        $mensaje .= '<p>Nuestro sistema ha detectado que se radico una nueva PQR.</p>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<a href="' . route('pqr_radicada_download', ['id' => $id]) . '" target="_blank" rel="noopener noreferrer">Resumen Radicado</a>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<p>lo invitamos a ingresasr a nuestro sistema.</p>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<a href="' . route('index') . '" target="_blank" rel="noopener noreferrer">' . route('index') . '</a>' . "\r\n";
        $mensaje .= '</div>' . "\r\n";
        $mensaje .= '</div>' . "\r\n";
        $mensaje .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>' . "\r\n";

        $mensaje .= '</body>' . "\r\n";
        $mensaje .= '</html>' . "\r\n";

        return $mensaje;
    }
    public function pqr_pdf_guardar($id)
    {
        $pqr_sel = PQR::findOrFail($id);
        $imagen = public_path('imagenes\sistema\icono_sistema.png');
        $apreciado = 'Apreciado';
        $representante = 'no';
        $empresa = 'no';
        if ($pqr_sel->persona_id != null) {
            $nombre = $pqr_sel->persona->nombre1 . ' ' . $pqr_sel->persona->nombre2 . ' ' . $pqr_sel->persona->apellido1 . ' ' . $pqr_sel->persona->apellido2;
            $email = $pqr_sel->persona->email;
        } else {
            $nombre = $pqr_sel->empresa->razon_social;
            $empresa = $pqr_sel->empresa->razon_social;
            $representante = $pqr_sel->empresa->representante->nombre1 . ' ' . $pqr_sel->empresa->representante->apellido1;
            $email = $pqr_sel->empresa->email;
        }
        $tipo_doc = $pqr_sel->persona->tipos_docu->tipo_id;
        $identificacion = $pqr_sel->empresa->identificacion;
        $motivos = '';
        foreach ($pqr_sel as $key => $value) {
            $motivos .= '<li></li>';
        }
        $data = [
            'imagen' => $imagen,
            'nombre' => $nombre,
            'imagen' => $imagen,
            'tipo_doc' => $tipo_doc,
            'identificacion' => $identificacion,
            'empresa' => $empresa,
            'representante' => $representante,
            'email' => $email,
        ];
        $pdf_name = "vista_previa.pdf";
        $path = public_path('\documentos\pqr\ ' . $pdf_name);
        $path = trim($path);
        $pdf = PDF::loadView('intranet.pdf.pdf_prorroga', $data)->save($path);
    }

    public function pqrRadicadaPdf($id)
    {
        $pqr_radicada = PQR::findOrFail($id);
        $imagen = public_path('imagenes\sistema\icono_sistema.png');
        //$imagen = asset('imagenes/sistema/icono_sistema.png');
        $fecha = $pqr_radicada->fecha_radicado;
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

        $anexos_li = '';
        foreach ($pqr_radicada->peticiones as $peticion) {
            if ($peticion->anexos->count() > 0) {
                foreach ($peticion->anexos as $anexo) {
                    $anexos_li .= '<li>';
                    $anexos_li .= '<a href="' . asset('documentos/pqr/' . $anexo->url) . '" target="_blank"';
                    $anexos_li .= 'rel="noopener noreferrer">';
                    $anexos_li .= '<p>' . $anexo->titulo . ' </p>';
                    $anexos_li .= '</a>';
                    $anexos_li .= '</li>';
                }
            } else {
                $anexos_li = '';
            }
        }

        $tipo_pqr_id = $pqr_radicada->tipo_pqr_id;
        $contenido = '';
        $num = 0;
        switch ($tipo_pqr_id) {
            case 1:
                $pqr = PQR::findOrFail($id);
                $contenido .= '<h4>Peticion</h4>';
                $contenido .= '<p>Lugar de adquisición del producto o servicio: ' . $pqr->adquisicion . '<p>';
                $contenido .= '<p>¿Su PQR es sobre un producto o servicio?: ' . $pqr->tipo . '<p>';
                $contenido .= '<p>Referencia: ' . $pqr->referencia_id . '<p>';
                $contenido .= '<p>No. Factura: ' . $pqr->factura . '<p>';
                $contenido .= '<p>Fecha de factura: ' . $pqr->fecha_factura . '<p>';
                $contenido .= '<p>Tipo de servicio: ' . $pqr->servicio_id . '<p>';
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Motivo: ' . $peticion->motivo->sub_motivo . '</h4>';
                    // $contenido .= '<p>Sub - Categoría Motivo: ' . $peticion->motivo->sub_motivo . '<p>';
                    foreach ($peticion->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                    $contenido .= '<p>Justificación: ' . $peticion->justificacion . '<p>';
                }
                break;
            case 2:
                $pqr = PQR::findOrFail($id);
                $contenido .= '<h4>Queja</h4>';
                $contenido .= '<p>Lugar de adquisición del producto o servicio: ' . $pqr->adquisicion . '<p>';
                $contenido .= '<p>¿Su PQR es sobre un producto o servicio?: ' . $pqr->tipo . '<p>';
                $contenido .= '<p>Referencia: ' . $pqr->referencia_id . '<p>';
                $contenido .= '<p>No. Factura: ' . $pqr->factura . '<p>';
                $contenido .= '<p>Fecha de factura: ' . $pqr->fecha_factura . '<p>';
                $contenido .= '<p>Tipo de servicio: ' . $pqr->servicio_id . '<p>';
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Motivo: ' . $peticion->motivo->sub_motivo . '</h4>';
                    // $contenido .= '<p>Sub - Categoría Motivo: ' . $peticion->motivo->sub_motivo . '<p>';
                    foreach ($peticion->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                    $contenido .= '<p>Justificación: ' . $peticion->justificacion . '<p>';
                }
                break;
            default:
                $pqr = PQR::findOrFail($id);
                $contenido .= '<h4>Reclamo</h4>';
                $contenido .= '<p>Lugar de adquisición del producto o servicio: ' . $pqr->adquisicion . '<p>';
                $contenido .= '<p>¿Su PQR es sobre un producto o servicio?: ' . $pqr->tipo . '<p>';
                $contenido .= '<p>Referencia: ' . $pqr->referencia_id . '<p>';
                $contenido .= '<p>No. Factura: ' . $pqr->factura . '<p>';
                $contenido .= '<p>Fecha de factura: ' . $pqr->fecha_factura . '<p>';
                $contenido .= '<p>Tipo de servicio: ' . $pqr->servicio_id . '<p>';
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Motivo: ' . $peticion->motivo->sub_motivo . '</h4>';
                    // $contenido .= '<p>Sub - Categoría Motivo: ' . $peticion->motivo->sub_motivo . '<p>';
                    foreach ($peticion->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                    $contenido .= '<p>Justificación: ' . $peticion->justificacion . '<p>';
                }
                break;
        }
        $data = [
            'imagen' => $imagen,
            'nombre' => $nombre,
            'tipo_doc' => $tipo_doc,
            'identificacion' => $identificacion,
            'email' => $email,
            'num_radicado' => $num_radicado,
            'fecha' => $fecha,
            'anexos_li' => $anexos_li,
            'contenido' => $contenido,

        ];
        $pdf = PDF::loadView('intranet.emails.pqr_radicada', compact('pqr_radicada', 'imagen', 'nombre', 'tipo_doc', 'identificacion', 'email', 'num_radicado', 'fecha', 'contenido', 'tipo_pqr_id'));

        return $pdf->download('PQR Radicada.pdf');
    }

    public function felicitacionRadicadaPdf($id)
    {

        $felicitacion = Felicitacion::findOrFail($id);
        //$imagen = asset('imagenes/sistema/icono_sistema.png');
        $imagen = public_path('imagenes\sistema\icono_sistema.png');
        $fecha = $felicitacion->fecha_radicado;
        $num_radicado = $felicitacion->radicado;


        if ($felicitacion->persona_id != null) {
            $nombre = $felicitacion->persona->nombre1 . ' ' . $felicitacion->persona->nombre2 . ' ' . $felicitacion->persona->apellido1 . ' ' . $felicitacion->persona->apellido2;
            $email = $felicitacion->persona->email;
            $identificacion = $felicitacion->persona->identificacion;
            $tipo_doc = $felicitacion->persona->tipos_docu->tipo_id;
        } else {
            $nombre = $felicitacion->empresa->razon_social;
            $empresa = $felicitacion->empresa->razon_social;
            $representante = $felicitacion->empresa->representante->nombre1 . ' ' . $felicitacion->empresa->representante->apellido1;
            $email = $felicitacion->empresa->email;
            $identificacion = $felicitacion->empresa->identificacion;
            $tipo_doc = $felicitacion->empresa->tipos_docu->tipo_id;
        }
        $pdf = PDF::loadView('intranet.emails.felicitacion', compact('felicitacion', 'imagen', 'nombre', 'tipo_doc', 'identificacion', 'email', 'num_radicado', 'fecha'));
        return $pdf->download('Felicitacion Radicada.pdf');
    }
    public function sugerenciaRadicadaPdf($id)
    {
        $sugerencia = Sugerencia::findOrFail($id);
        $imagen = public_path('imagenes\sistema\icono_sistema.png');
        $fecha = $sugerencia->fecha_radicado;
        $num_radicado = $sugerencia->radicado;
        if ($sugerencia->persona_id != null) {
            $nombre = $sugerencia->persona->nombre1 . ' ' . $sugerencia->persona->nombre2 . ' ' . $sugerencia->persona->apellido1 . ' ' . $sugerencia->persona->apellido2;
            $email = $sugerencia->persona->email;
            $identificacion = $sugerencia->persona->identificacion;
            $tipo_doc = $sugerencia->persona->tipos_docu->tipo_id;
        } else {
            $nombre = $sugerencia->empresa->razon_social;
            $empresa = $sugerencia->empresa->razon_social;
            $representante = $sugerencia->empresa->representante->nombre1 . ' ' . $sugerencia->empresa->representante->apellido1;
            $email = $sugerencia->empresa->email;
            $identificacion = $sugerencia->empresa->identificacion;
            $tipo_doc = $sugerencia->empresa->tipos_docu->tipo_id;
        }
        $pdf = PDF::loadView('intranet.emails.sugerencia', compact('sugerencia', 'imagen', 'nombre', 'tipo_doc', 'identificacion', 'email', 'num_radicado', 'fecha'));
        return $pdf->download('Sugerencia Radicada.pdf');
    }

    public function aclaracionPdf($id)
    {
        $aclaracion = Aclaracion::findOrFail($id);
        $imagen = public_path('imagenes\sistema\icono_sistema.png');
        $firma = public_path('imagenes\sistema\firma.png');
        $fecha = $aclaracion->peticion->pqr->fecha_radicado;
        $num_radicado = $aclaracion->peticion->pqr->radicado;
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
        $imagen = public_path('imagenes\sistema\icono_sistema.png');
        $fecha = $aclaracion->peticion->pqr->fecha_radicado;
        $num_radicado = $aclaracion->peticion->pqr->radicado;
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
        $pdf = PDF::loadView('intranet.emails.aclaracion', compact('aclaracion', 'imagen', 'nombre', 'tipo_doc', 'identificacion', 'email', 'num_radicado', 'fecha',));
        return $pdf->download('Aclaracion Radicada.pdf');
    }
    public function prorrogaPdf($id)
    {
        $pqr = PQR::findOrFail($id);
        $imagen = public_path('imagenes\sistema\icono_sistema.png');
        $firma = public_path('imagenes\sistema\firma.png');
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
        $imagen = public_path('imagenes\sistema\icono_sistema.png');
        $fecha = date('Y-m-d H:i:s');
        $num_radicado = $recurso->peticion->pqr->radicado;
        if ($recurso->peticion->pqr->persona_id != null) {
            $nombre = $recurso->peticion->pqr->persona->nombre1 . ' ' . $recurso->peticion->pqr->persona->nombre2 . ' ' . $recurso->peticion->pqr->persona->apellido1 . ' ' . $recurso->peticion->pqr->persona->apellido2;
            $email = $recurso->peticion->pqr->persona->email;
            $identificacion = $recurso->peticion->pqr->persona->identificacion;
            $tipo_doc = $recurso->peticion->pqr->persona->tipos_docu->tipo_id;
        } else {
            $nombre = $recurso->peticion->pqr->empresa->razon_social;
            $empresa = $recurso->peticion->pqr->empresa->razon_social;
            $representante = $recurso->peticion->pqr->empresa->representante->nombre1 . ' ' . $recurso->peticion->pqr->empresa->representante->apellido1;
            $email = $recurso->peticion->pqr->empresa->email;
            $identificacion = $recurso->peticion->pqr->empresa->identificacion;
            $tipo_doc = $recurso->peticion->pqr->empresa->tipos_docu->tipo_id;
        }
        $pdf = PDF::loadView('intranet.emails.constancia_recurso', compact('recurso', 'imagen', 'nombre', 'tipo_doc', 'identificacion', 'email', 'num_radicado', 'fecha'));
        return $pdf->download('Constancia Recurso.pdf');
    }
}
