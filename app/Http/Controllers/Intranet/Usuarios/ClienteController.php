<?php

namespace App\Http\Controllers\Intranet\Usuarios;

use App\Models\PQR\PQR;
use App\Mail\RI_Radicada;
use App\Mail\SD_Radicada;
use App\Models\PQR\Anexo;
use App\Models\PQR\Hecho;
use App\Mail\CUO_Radicada;
use App\Mail\PQR_Radicada;
use App\Mail\SDI_Radicada;
use App\Models\Admin\Pais;
use App\Models\PQR\Estado;
use App\Models\PQR\tipoPQR;
use App\Models\PQR\Peticion;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Models\PQR\SubMotivo;
use App\Models\Admin\Tipo_Docu;
use App\Models\Productos\Marca;
use App\Mail\SugerenciaRadicada;
use App\Models\Personas\Persona;
use App\Http\Requests\ValidarPqr;
use App\Models\Admin\Departamento;
use App\Models\Admin\DiasFestivos;
use App\Models\Consultas\Consulta;
use App\Models\Denuncias\Denuncia;
use App\Models\Productos\Producto;
use App\Models\Servicios\Servicio;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\Felicitacion_Radicada;
use App\Models\Productos\Categoria;
use App\Http\Controllers\Controller;
use App\Models\Productos\Referencia;
use Illuminate\Support\Facades\Mail;
use App\Models\Sugerencias\Sugerencia;
use Illuminate\Support\Facades\Config;
use App\Models\Denuncias\DenunciaAnexo;
use App\Models\Denuncias\DenunciaHecho;
use App\Models\Sugerencias\SugerenciaDoc;
use App\Models\Felicitaciones\Felicitacion;
use App\Models\Sugerencias\SugerenciaHecho;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Models\Denuncias\DenunciaIrregularidad;
use App\Models\Felicitaciones\FelicitacionHecho;
use App\Http\Controllers\Fechas\FechasController;
use App\Models\SolicitudDatos\SolicitudDatosAnexo;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use App\Models\ConceptosUOpiniones\ConceptoUOpinion;
use App\Models\SolicitudDatos\SolicitudDatosSolicitud;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoAnexo;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoPeticion;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsulta;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsultaAnexo;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsultaHecho;
use App\Http\Controllers\Intranet\Funcionarios\ConceptoUOpinionController;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuario = Usuario::findOrFail(session('id_usuario'));
        $pqr_S = PQR::where('persona_id', session('id_usuario'))->get();
        $conceptos = ConceptoUOpinion::where('persona_id', session('id_usuario'))->get();
        $solicitudes_datos = SolicitudDatos::where('persona_id', session('id_usuario'))->get();
        $denuncias = Denuncia::where('persona_id', session('id_usuario'))->get();
        $felicitaciones = Felicitacion::where('persona_id', session('id_usuario'))->get();
        $solicitudes_doc = SolicitudDocInfo::where('persona_id', session('id_usuario'))->get();
        $sugerencias = Sugerencia::where('persona_id', session('id_usuario'))->get();

        if ($pqr_S->count() > 0) {
            foreach ($pqr_S as $pqr) {
                // if ($pqr->peticiones->count() == 0) {
                //     $pqr_update['estado'] = 'Sin radicar';
                //     PQR::findOrFail($pqr->id)->update($pqr_update);
                // } elseif ($pqr->estado == 'Sin radicar') {
                //     $pqr_update['estado'] = 'Radicada, sin iniciar tramite';
                //     PQR::findOrFail($pqr->id)->update($pqr_update);
                // }
            }
        }
        $pqr_S = PQR::where('persona_id', session('id_usuario'))->get();
        return view('intranet.usuarios.listado', compact('pqr_S', 'conceptos', 'solicitudes_datos', 'denuncias', 'felicitaciones', 'solicitudes_doc', 'sugerencias', 'usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generar()
    {
        $tipoPQR = tipoPQR::all();
        return view('intranet.usuarios.crear', compact('tipoPQR'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function generarPQR($id)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $tipo_pqr = tipoPQR::findOrFail($id);
        $departamentos = Departamento::get();
        $categorias = Categoria::get();
        $servicios = Servicio::all();
        return view('intranet.usuarios.crearPQR', compact('usuario', 'tipo_pqr', 'departamentos', 'categorias', 'servicios'));
    }

    public function generarPQR_guardar(ValidarPqr $request)
    {
        $tipo_pqr = tipoPQR::findOrFail($request['tipo_pqr_id']);
        $diasLimite = $tipo_pqr['tiempos'];
        $diaGeneracion = date("Y-m-d");
        $respuestaDias = FechasController::festivos($diasLimite, $diaGeneracion);
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaPQR['persona_id'] = $usuario->id;
        } else {
            $nuevaPQR['empresa_id'] = $usuario->id;
        }
        $nuevaPQR['tipo_pqr_id'] = $request['tipo_pqr_id'];
        $nuevaPQR['adquisicion'] = $request['adquisicion'];
        $nuevaPQR['sede_id'] = $request['sede_id'];
        $nuevaPQR['tipo'] = $request['tipo'];
        $nuevaPQR['referencia_id'] = $request['referencia_id'];
        $nuevaPQR['factura'] = $request['factura'];
        $nuevaPQR['fecha_factura'] = $request['fecha_factura'];
        if (isset($request['servicio_id'])) {
            $nuevaPQR['servicio_id'] = $request['servicio_id'];
        }
        $nuevaPQR['fecha_generacion'] = date("Y-m-d");
        $nuevaPQR['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));
        $estado = Estado::findOrFail(1);
        $nuevaPQR['estadospqr_id'] = $estado['id'];
        $nuevaPQR['tiempo_limite'] = $respuestaDias;
        $pqr = PQR::create($nuevaPQR);
        $pqr_rad['radicado'] = $tipo_pqr->sigla . '-' . date('Y') . '-' . $pqr->id;
        PQR::findOrFail($pqr->id)->update($pqr_rad);
        $pqr = PQR::findOrFail($pqr->id);

        return redirect('/usuario/generarPQR-motivos/' . $pqr->id);
    }

    public function generarPQR_motivos($id)
    {
        $pqr = PQR::findOrFail($id);
        return view('intranet.usuarios.crearPQRMotivos', compact('pqr'));
    }

    public function generarPQR_motivos_guardar(Request $request)
    {
        $cantidadPeticiones = $request['cantidadmotivos'];
        $documentos = $request->allFiles();
        $contadorAnexos = 0;
        $contadorHechos = 0;
        $iteradorAnexos = 0;
        $iteradorHechos = 0;
        for ($i = 0; $i < $cantidadPeticiones; $i++) {
            $nuevaPQRPeticion['pqr_id'] = $request['pqr_id'];
            $nuevaPQRPeticion['motivo_sub_id'] = $request['motivo_sub_id' . $i];
            $nuevaPQRPeticion['otro'] = $request['otro' . $i];
            $nuevaPQRPeticion['justificacion'] = $request['justificacion' . $i];
            $contadorAnexos += $request['cantidadAnexosMotivo' . $i];
            $contadorHechos += $request['cantidadHechosMotivo' . $i];
            $peticion = Peticion::create($nuevaPQRPeticion);
            for ($j = $iteradorAnexos; $j < $contadorAnexos; $j++) {
                if ($request->hasFile("documentos$j")) {
                    $ruta = Config::get('constantes.folder_doc_pqr');
                    $ruta = trim($ruta);
                    $doc_subido = $documentos["documentos$j"];
                    $tamaño = $doc_subido->getSize();
                    if ($tamaño > 0) {
                        $tamaño = $tamaño / 1000;
                    }
                    $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                    $nuevo_documento['peticion_id'] = $peticion->id;
                    $nuevo_documento['titulo'] = $request["titulo$j"];
                    if ($request["descripcion$j"]) {
                        $nuevo_documento['descripcion'] = $request["descripcion$j"];
                    } else {
                        $nuevo_documento['descripcion'] = '';
                    }
                    $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                    $nuevo_documento['peso'] = $tamaño;
                    $nuevo_documento['url'] = $nombre_doc;
                    $doc_subido->move($ruta, $nombre_doc);
                    Anexo::create($nuevo_documento);
                }
            }
            for ($k = $iteradorHechos; $k < $contadorHechos; $k++) {
                $nuevosHechos['peticion_id'] = $peticion->id;
                $nuevosHechos['hecho'] = $request['hecho' . $k];
                Hecho::create($nuevosHechos);
            }
            $iteradorAnexos += $request['cantidadAnexosMotivo' . $i];
            $iteradorHechos += $request['cantidadHechosMotivo' . $i];
        }
        $idPQR =  $request['pqr_id'];
        $pqr = PQR::findOrFail($idPQR);
        if ($pqr->persona_id != null) {
            $email = $pqr->persona->email;
        } else {
            $email = $pqr->empresa->email;
        }
        $id_pqr = $pqr->id;
        Mail::to($email)->send(new PQR_Radicada($id_pqr));
        return redirect('/usuario/generar')->with('id', $idPQR)->with('pqr_tipo', $pqr->tipo_pqr_id)->with('radicado', $pqr->radicado)->with('fecha_radicado', $pqr->created_at);
    }

    public function generarConceptoUOpinion()
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $departamentos = Departamento::get();
        return view('intranet.usuarios.crearConceptoUOpinion', compact('usuario', 'departamentos'));
    }

    public function generarConceptoUOpinion_guardar(Request $request)
    {
        $tipo_pqr = tipoPQR::findOrFail(4);
        $diasLimite = $tipo_pqr['tiempos'];
        $diaGeneracion = date("Y-m-d");
        $respuestaDias = FechasController::festivos($diasLimite, $diaGeneracion);
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaConcepto['persona_id'] = $usuario->id;
        } else {
            $nuevaConcepto['empresa_id'] = $usuario->id;
        }
        $nuevaConcepto['sede_id'] = $request['sede_id'];
        $nuevaConcepto['fecha_generacion'] = date("Y-m-d");
        $nuevaConcepto['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $estado = Estado::findOrFail(1);
        $nuevaConcepto['estadospqr_id'] = $estado['id'];
        $nuevaConcepto['tiempo_limite'] = $respuestaDias;
        $concepto = ConceptoUOpinion::create($nuevaConcepto);

        $pqr_rad['radicado'] = $tipo_pqr->sigla . '-' . date('Y') . '-' . $concepto->id;
        ConceptoUOpinion::findOrFail($concepto->id)->update($pqr_rad);
        $concepto = ConceptoUOpinion::findOrFail($concepto->id);

        $nuevasConsultas['conceptouopinion_id'] = $concepto->id;
        $cantidadConsultas = $request['cantidadConsultas'];
        $documentos = $request->allFiles();
        $contadorAnexos = 0;
        $contadorHechos = 0;
        $iteradorAnexos = 0;
        $iteradorHechos = 0;
        for ($i = 0; $i < $cantidadConsultas; $i++) {
            $nuevasConsultas['consulta'] = $request['consulta' . $i];
            $contadorAnexos += $request['cantidadAnexosConsulta' . $i];
            $contadorHechos += $request['cantidadHechosConsulta' . $i];
            $consulta = ConceptoUOpinionConsulta::create($nuevasConsultas);
            for ($j = $iteradorAnexos; $j < $contadorAnexos; $j++) {
                if ($request->hasFile("documentos$j")) {
                    $ruta = Config::get('constantes.folder_doc_conceptouopinion');
                    $ruta = trim($ruta);
                    $doc_subido = $documentos["documentos$j"];
                    $tamaño = $doc_subido->getSize();
                    if ($tamaño > 0) {
                        $tamaño = $tamaño / 1000;
                    }
                    $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                    $nuevo_documento['conceptouopinionconsultas_id'] = $consulta->id;
                    $nuevo_documento['titulo'] = $request["titulo$j"];
                    if ($request["descripcion$j"]) {
                        $nuevo_documento['descripcion'] = $request["descripcion$j"];
                    } else {
                        $nuevo_documento['descripcion'] = '';
                    }
                    $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                    $nuevo_documento['peso'] = $tamaño;
                    $nuevo_documento['url'] = $nombre_doc;
                    $doc_subido->move($ruta, $nombre_doc);
                    ConceptoUOpinionConsultaAnexo::create($nuevo_documento);
                }
            }
            for ($k = $iteradorHechos; $k < $contadorHechos; $k++) {
                $nuevosHechos['conceptouopinionconsultas_id'] = $consulta->id;
                $nuevosHechos['hecho'] = $request['hecho' . $k];
                ConceptoUOpinionConsultaHecho::create($nuevosHechos);
            }
            $iteradorAnexos += $request['cantidadAnexosConsulta' . $i];
            $iteradorHechos += $request['cantidadHechosConsulta' . $i];
        }

        if ($concepto->persona_id != null) {
            $email = $concepto->persona->email;
        } else {
            $email = $concepto->empresa->email;
        }
        $id_pqr = $concepto->id;
        Mail::to($email)->send(new CUO_Radicada($id_pqr));
        return redirect('/usuario/generar')->with('id', $concepto->id)->with('pqr_tipo', $concepto->tipo_pqr_id)->with('radicado', $concepto->radicado)->with('fecha_radicado', $concepto->created_at);
    }

    public function generarFelicitacion()
    {
        $departamentos = Departamento::get();
        return view('intranet.usuarios.crearFeclicitaciones', compact('departamentos'));
    }

    public function generarFelicitacion_guardar(Request $request)
    {
        $tipo_pqr = tipoPQR::findOrFail(7);
        $diasLimite = $tipo_pqr['tiempos'];
        $diaGeneracion = date("Y-m-d");
        $respuestaDias = FechasController::festivos($diasLimite, $diaGeneracion);
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaFelicitacion['persona_id'] = $usuario->id;
        } else {
            $nuevaFelicitacion['empresa_id'] = $usuario->id;
        }
        $nuevaFelicitacion['nombre_funcionario'] = $request['nombre_funcionario'];
        $nuevaFelicitacion['sede_id'] = $request['sede_id'];
        $nuevaFelicitacion['felicitacion'] = $request['felicitacion'];
        $nuevaFelicitacion['fecha_generacion'] = date("Y-m-d");
        $nuevaFelicitacion['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $estado = Estado::findOrFail(6);
        $nuevaFelicitacion['estadospqr_id'] = $estado['id'];
        $nuevaFelicitacion['tiempo_limite'] = $respuestaDias;
        $felicitacion = Felicitacion::create($nuevaFelicitacion);

        $pqr_rad['radicado'] = $tipo_pqr->sigla . '-' . date('Y') . '-' . $felicitacion->id;
        Felicitacion::findOrFail($felicitacion->id)->update($pqr_rad);
        $felicitacion = Felicitacion::findOrFail($felicitacion->id);

        $nuevosHechos['felicitacion_id'] = $felicitacion->id;
        $cantidadHechos = $request['cantidadHechos'];
        for ($i = 0; $i < $cantidadHechos; $i++) {
            $nuevosHechos['hecho'] = $request['hecho' . $i];
            FelicitacionHecho::create($nuevosHechos);
        }
        if ($felicitacion->persona_id != null) {
            $email = $felicitacion->persona->email;
        } else {
            $email = $felicitacion->empresa->email;
        }
        $id_felicitacion = $felicitacion->id;
        Mail::to($email)->send(new Felicitacion_Radicada($id_felicitacion));

        return redirect('/usuario/generar')->with('id', $felicitacion->id)->with('pqr_tipo', $felicitacion->tipo_pqr_id)->with('radicado', $felicitacion->radicado)->with('fecha_radicado', $felicitacion->created_at);
    }

    public function gererarDenuncia()
    {
        $departamentos = Departamento::get();
        return view('intranet.usuarios.crearDenuncia', compact('departamentos'));
    }

    public function gererarDenuncia_guardar(Request $request)
    {
        $tipo_pqr = tipoPQR::findOrFail(6);
        $diasLimite = $tipo_pqr['tiempos'];
        $diaGeneracion = date("Y-m-d");
        $respuestaDias = FechasController::festivos($diasLimite, $diaGeneracion);
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaDenuncia['persona_id'] = $usuario->id;
        } else {
            $nuevaDenuncia['empresa_id'] = $usuario->id;
        }
        $nuevaDenuncia['sede_id'] = $request['sede_id'];
        $nuevaDenuncia['fecha_generacion'] = date("Y-m-d");
        $nuevaDenuncia['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $estado = Estado::findOrFail(1);
        $nuevaDenuncia['estadospqr_id'] = $estado['id'];
        $nuevaDenuncia['tiempo_limite'] = $respuestaDias;
        $denuncia = Denuncia::create($nuevaDenuncia);

        $pqr_rad['radicado'] = $tipo_pqr->sigla . '-' . date('Y') . '-' . $denuncia->id;
        Denuncia::findOrFail($denuncia->id)->update($pqr_rad);
        $denuncia = Denuncia::findOrFail($denuncia->id);

        $nuevasIrregularidades['denuncias_id'] = $denuncia->id;
        $cantidadIrregularidades = $request['cantidadIrregularidades'];
        $documentos = $request->allFiles();
        $contadorAnexos = 0;
        $contadorHechos = 0;
        $iteradorAnexos = 0;
        $iteradorHechos = 0;
        for ($i = 0; $i < $cantidadIrregularidades; $i++) {
            $nuevasIrregularidades['irregularidad'] = $request['tipo_irregularidad' . $i];
            $nuevasIrregularidades['otro'] = $request['otro' . $i];
            $contadorAnexos += $request['cantidadAnexosIrregularidad' . $i];
            $contadorHechos += $request['cantidadHechosIrregularidad' . $i];
            $irregularidad = DenunciaIrregularidad::create($nuevasIrregularidades);
            for ($j = $iteradorAnexos; $j < $contadorAnexos; $j++) {
                if ($request->hasFile("documentos$j")) {
                    $ruta = Config::get('constantes.folder_doc_denuncias');
                    $ruta = trim($ruta);
                    $doc_subido = $documentos["documentos$j"];
                    $tamaño = $doc_subido->getSize();
                    if ($tamaño > 0) {
                        $tamaño = $tamaño / 1000;
                    }
                    $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                    $nuevo_documento['denunciairregularidades_id'] = $irregularidad->id;
                    $nuevo_documento['titulo'] = $request["titulo$j"];
                    if ($request["descripcion$j"]) {
                        $nuevo_documento['descripcion'] = $request["descripcion$j"];
                    } else {
                        $nuevo_documento['descripcion'] = '';
                    }
                    $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                    $nuevo_documento['peso'] = $tamaño;
                    $nuevo_documento['url'] = $nombre_doc;
                    $doc_subido->move($ruta, $nombre_doc);
                    DenunciaAnexo::create($nuevo_documento);
                }
            }
            for ($k = $iteradorHechos; $k < $contadorHechos; $k++) {
                $nuevosHechos['denunciairregularidades_id'] = $irregularidad->id;
                $nuevosHechos['hecho'] = $request['hecho' . $k];
                DenunciaHecho::create($nuevosHechos);
            }
            $iteradorAnexos += $request['cantidadAnexosIrregularidad' . $i];
            $iteradorHechos += $request['cantidadHechosIrregularidad' . $i];
        }
        if ($denuncia->persona_id != null) {
            $email = $denuncia->persona->email;
        } else {
            $email = $denuncia->empresa->email;
        }
        $id_pqr = $denuncia->id;
        Mail::to($email)->send(new RI_Radicada($id_pqr));
        return redirect('/usuario/generar')->with('id', $denuncia->id)->with('pqr_tipo', $denuncia->tipo_pqr_id)->with('radicado', $denuncia->radicado)->with('fecha_radicado', $denuncia->created_at);
    }

    public function generarSolicitudDatos()
    {
        $departamentos = Departamento::get();
        return view('intranet.usuarios.crearSolicitudDatos', compact('departamentos'));
    }

    public function generarSolicitudDatos_guardar(Request $request)
    {
        $tipo_pqr = tipoPQR::findOrFail(5);
        $diasLimite = $tipo_pqr['tiempos'];
        $diaGeneracion = date("Y-m-d");
        $respuestaDias = FechasController::festivos($diasLimite, $diaGeneracion);
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaSolicitud['persona_id'] = $usuario->id;
        } else {
            $nuevaSolicitud['empresa_id'] = $usuario->id;
        }
        $nuevaSolicitud['sede_id'] = $request['sede_id'];
        $nuevaSolicitud['fecha_generacion'] = date("Y-m-d");
        $nuevaSolicitud['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $estado = Estado::findOrFail(1);
        $nuevaSolicitud['estadospqr_id'] = $estado['id'];
        $nuevaSolicitud['tiempo_limite'] = $respuestaDias;
        $solicitudRad = SolicitudDatos::create($nuevaSolicitud);

        $pqr_rad['radicado'] = $tipo_pqr->sigla . '-' . date('Y') . '-' . $solicitudRad->id;
        SolicitudDatos::findOrFail($solicitudRad->id)->update($pqr_rad);
        $solicitudId = SolicitudDatos::findOrFail($solicitudRad->id);

        $nuevasSolicitudes['solicituddatos_id'] = $solicitudId->id;
        $cantidadSolicitudes = $request['cantidadSolicitudes'];
        $documentos = $request->allFiles();
        $contadorAnexos = 0;
        $iterador = 0;
        for ($i = 0; $i < $cantidadSolicitudes; $i++) {
            $nuevasSolicitudes['tiposolicitud'] = $request['tiposolicitud' . $i];
            $nuevasSolicitudes['datossolicitud'] = $request['datossolicitud' . $i];
            $nuevasSolicitudes['descripcionsolicitud'] = $request['descripcionsolicitud' . $i];
            $contadorAnexos += $request['cantidadAnexosSolicitud' . $i];
            $solicitud = SolicitudDatosSolicitud::create($nuevasSolicitudes);
            for ($j = $iterador; $j < $contadorAnexos; $j++) {
                if ($request->hasFile("documentos$j")) {
                    $ruta = Config::get('constantes.folder_doc_solicituddatos');
                    $ruta = trim($ruta);
                    $doc_subido = $documentos["documentos$j"];
                    $tamaño = $doc_subido->getSize();
                    if ($tamaño > 0) {
                        $tamaño = $tamaño / 1000;
                    }
                    $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                    $nuevo_documento['solicituddatossolicitud_id'] = $solicitud->id;
                    $nuevo_documento['titulo'] = $request["titulo$j"];
                    if ($request["descripcion$j"]) {
                        $nuevo_documento['descripcion'] = $request["descripcion$j"];
                    } else {
                        $nuevo_documento['descripcion'] = '';
                    }
                    $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                    $nuevo_documento['peso'] = $tamaño;
                    $nuevo_documento['url'] = $nombre_doc;
                    $doc_subido->move($ruta, $nombre_doc);
                    SolicitudDatosAnexo::create($nuevo_documento);
                }
            }
            $iterador += $request['cantidadAnexosSolicitud' . $i];
        }

        if ($solicitudId->persona_id != null) {
            $email = $solicitudId->persona->email;
        } else {
            $email = $solicitudId->empresa->email;
        }
        $id_pqr = $solicitudId->id;
        Mail::to($email)->send(new SD_Radicada($id_pqr));
        return redirect('/usuario/generar')->with('id', $solicitudId->id)->with('pqr_tipo', $solicitudId->tipo_pqr_id)->with('radicado', $solicitudId->radicado)->with('fecha_radicado', $solicitudId->created_at);
    }
    
    public function generarSolicitudDocumentos()
    {
        $departamentos = Departamento::get();
        return view('intranet.usuarios.crearSolicitudDocumentos', compact('departamentos'));
    }

    public function generarSolicitudDocumentos_guardar(Request $request)
    {
        $tipo_pqr = tipoPQR::findOrFail(8);
        $diasLimite = $tipo_pqr['tiempos'];
        $diaGeneracion = date("Y-m-d");
        $respuestaDias = FechasController::festivos($diasLimite, $diaGeneracion);
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaSolicitud['persona_id'] = $usuario->id;
        } else {
            $nuevaSolicitud['empresa_id'] = $usuario->id;
        }
        $nuevaSolicitud['sede_id'] = $request['sede_id'];
        $nuevaSolicitud['fecha_generacion'] = date("Y-m-d");
        $nuevaSolicitud['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $estado = Estado::findOrFail(1);
        $nuevaSolicitud['estadospqr_id'] = $estado['id'];
        $nuevaSolicitud['tiempo_limite'] = $respuestaDias;
        $solicitud = SolicitudDocInfo::create($nuevaSolicitud);

        $pqr_rad['radicado'] = $tipo_pqr->sigla . '-' . date('Y') . '-' . $solicitud->id;
        SolicitudDocInfo::findOrFail($solicitud->id)->update($pqr_rad);
        $solicitud = SolicitudDocInfo::findOrFail($solicitud->id);

        $nuevasPeticiones['solicituddocinfo_id'] = $solicitud->id;
        $cantidadPeticiones = $request['cantidadPeticiones'];
        $documentos = $request->allFiles();
        $contadorAnexos = 0;
        $iterador = 0;
        for ($i = 0; $i < $cantidadPeticiones; $i++) {
            $nuevasPeticiones['peticion'] = $request['peticion' . $i];
            $nuevasPeticiones['indentifiquedocinfo'] = $request['indentifiquedocinfo' . $i];
            $nuevasPeticiones['justificacion'] = $request['justificacion' . $i];
            $contadorAnexos += $request['cantidadAnexosSolicitud' . $i];
            $peticion = SolicitudDocInfoPeticion::create($nuevasPeticiones);
            for ($j = $iterador; $j < $contadorAnexos; $j++) {
                if ($request->hasFile("documentos$j")) {
                    $ruta = Config::get('constantes.folder_doc_solicituddocinfo');
                    $ruta = trim($ruta);
                    $doc_subido = $documentos["documentos$j"];
                    $tamaño = $doc_subido->getSize();
                    if ($tamaño > 0) {
                        $tamaño = $tamaño / 1000;
                    }
                    $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                    $nuevo_documento['solicituddocinfopeticion_id'] = $peticion->id;
                    $nuevo_documento['titulo'] = $request["titulo$j"];
                    if ($request["descripcion$j"]) {
                        $nuevo_documento['descripcion'] = $request["descripcion$j"];
                    } else {
                        $nuevo_documento['descripcion'] = '';
                    }
                    $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                    $nuevo_documento['peso'] = $tamaño;
                    $nuevo_documento['url'] = $nombre_doc;
                    $doc_subido->move($ruta, $nombre_doc);
                    SolicitudDocInfoAnexo::create($nuevo_documento);
                }
            }
            $iterador += $request['cantidadAnexosSolicitud' . $i];
        }
        $solicitud = SolicitudDocInfo::findOrFail($solicitud->id);
        
        if ($solicitud->persona_id != null) {
            $email = $solicitud->persona->email;
        } else {
            $email = $solicitud->empresa->email;
        }
        $id_pqr = $solicitud->id;
        Mail::to($email)->send(new SDI_Radicada($id_pqr));
        return redirect('/usuario/generar')->with('id', $solicitud->id)->with('pqr_tipo', $solicitud->tipo_pqr_id)->with('radicado', $solicitud->radicado)->with('fecha_radicado', $solicitud->created_at);
    }

    public function generarSugerencia()
    {
        $departamentos = Departamento::get();
        return view('intranet.usuarios.crearSugerencia', compact('departamentos'));
    }

    public function generarSugerencia_guardar(Request $request)
    {
        $tipo_pqr = tipoPQR::findOrFail(9);
        $diasLimite = $tipo_pqr['tiempos'];
        $diaGeneracion = date("Y-m-d");
        $respuestaDias = FechasController::festivos($diasLimite, $diaGeneracion);

        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaSugerencia['persona_id'] = $usuario->id;
        } else {
            $nuevaSugerencia['empresa_id'] = $usuario->id;
        }
        $nuevaSugerencia['sede_id'] = $request['sede_id'];
        $nuevaSugerencia['sugerencia'] = $request['sugerencia'];
        $nuevaSugerencia['fecha_generacion'] = date("Y-m-d");
        $nuevaSugerencia['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $estado = Estado::findOrFail(6);
        $nuevaSugerencia['estadospqr_id'] = $estado['id'];
        $nuevaSugerencia['tiempo_limite'] = $respuestaDias;
        $sugerencia = Sugerencia::create($nuevaSugerencia);

        $pqr_rad['radicado'] = $tipo_pqr->sigla . '-' . date('Y') . '-' . $sugerencia->id;
        Sugerencia::findOrFail($sugerencia->id)->update($pqr_rad);
        $sugerencia = Sugerencia::findOrFail($sugerencia->id);

        $nuevosHechos['sugerencia_id'] = $sugerencia->id;
        $cantidadHechos = $request['cantidadHechos'];
        for ($i = 0; $i < $cantidadHechos; $i++) {
            $nuevosHechos['hecho'] = $request['hecho' . $i];
            SugerenciaHecho::create($nuevosHechos);
        }
        $cantidadAnexos = $request['cantidadAnexos'];
        $documentos = $request->allFiles();
        for ($i = 0; $i < $cantidadAnexos; $i++) {
            if ($request->hasFile("documentos$i")) {
                $ruta = Config::get('constantes.folder_doc_sugerencias');
                $ruta = trim($ruta);
                $doc_subido = $documentos["documentos$i"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_documento['sugerencia_id'] = $sugerencia->id;
                $nuevo_documento['titulo'] = $request["titulo$i"];
                if ($request["descripcion$i"]) {
                    $nuevo_documento['descripcion'] = $request["descripcion$i"];
                } else {
                    $nuevo_documento['descripcion'] = '';
                }
                $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                $nuevo_documento['peso'] = $tamaño;
                $nuevo_documento['url'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
                SugerenciaDoc::create($nuevo_documento);
            }
        }

        if ($sugerencia->persona_id != null) {
            $email = $sugerencia->persona->email;
        } else {
            $email = $sugerencia->empresa->email;
        }
        $id_sugerencia = $sugerencia->id;
        Mail::to($email)->send(new SugerenciaRadicada($id_sugerencia));

        return redirect('/usuario/generar')->with('id', $sugerencia->id)->with('pqr_tipo', $sugerencia->tipo_pqr_id)->with('radicado', $sugerencia->radicado)->with('fecha_radicado', $sugerencia->created_at);
    }

    public function actualizar_datos()
    {
        $tipos_docu = Tipo_Docu::get();
        $paises = Pais::get();
        $departamentos = Departamento::get();
        $usuario = Usuario::findorFail(session('id_usuario'));
        return view('intranet/datos_personales.index', compact('usuario', 'tipos_docu', 'paises', 'departamentos'));
    }

    public function cambiar_password()
    {
        return view('intranet/password.index');
    }

    public function crear_usuario()
    {
        $tipos_docu = Tipo_Docu::get();
        $paises = Pais::get();
        $departamentos = Departamento::get();
        $usuario = Usuario::findorFail(session('id_usuario'));
        return view('intranet/crear_usuario_asistido.index', compact('usuario', 'tipos_docu', 'paises', 'departamentos'));
    }

    public function consulta_politicas()
    {
        return view('intranet/consulta_politicas.index');
    }

    public function ayuda()
    {
        return view('intranet/ayuda.index');
    }

    public function cargar_submotivos(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return SubMotivo::where('motivo_id', $id)->get();
        }
    }

    public function cargar_productos(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Producto::where('categoria_id', $id)->get();
        }
    }

    public function cargar_marcas(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Marca::where('producto_id', $id)->get();
        }
    }

    public function cargar_referencias(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Referencia::where('marca_id', $id)->get();
        }
    }

    public function actualizar(Request $request)
    {
        $direccion = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $request['direccion']);
        if ($request['direccion'] == 'no') {
            $discapacidad = 0;
        } else {
            $discapacidad = 1;
        }
        $usuarioActualizar['telefono_fijo'] = $request['telefono_fijo'];
        $usuarioActualizar['telefono_celu'] = $request['telefono_celu'];
        $usuarioActualizar['direccion'] = $direccion;
        $usuarioActualizar['pais_id'] = $request['pais_id'];
        $usuarioActualizar['municipio_id'] = $request['municipio_id'];
        $usuarioActualizar['grado_educacion'] = $request['grado'];
        $usuarioActualizar['discapacidad'] = $discapacidad;
        Persona::findOrFail(session('id_usuario'))->update($usuarioActualizar);
        return redirect('admin/index')->with('mensaje', 'Se actualizaron los datos de manera exitosa en la plataforma');
    }


    //=========================================================================================================================
    public function gestionar_PQR($id)
    {
        $pqr = PQR::findOrFail($id);
        return view('intranet.usuarios.gestion_pqr', compact('pqr'));
    }
    //=========================================================================================================================
    public function gestionar_felicitaciones($id)
    {
        $felicitacion = Felicitacion::findOrFail($id);
        return view('intranet.usuarios.gestion_felicitaciones', compact('felicitacion'));
    }
    //=========================================================================================================================
    public function gestionar_sugerencia($id)
    {
        $sugerencia = Sugerencia::findOrFail($id);
        return view('intranet.usuarios.gestion_sugerencias', compact('sugerencia'));
    }
    //=========================================================================================================================
    public function gestionar_solicitudDatos($id)
    {
        $solicitudDatos = SolicitudDatos::findOrFail($id);
        return view('intranet.usuarios.gestion_solicitud_datos', compact('solicitudDatos'));
    }
    //=========================================================================================================================
    public function gestionar_solicitudDocInfo($id)
    {
        $solicitudDocInfo = SolicitudDocInfo::findOrFail($id);
        return view('intranet.usuarios.gestion_solicitud_docinfo', compact('solicitudDocInfo'));
    }
    //=========================================================================================================================
    public function gestionar_conceptoUOpinion($id)
    {
        $concepto = ConceptoUOpinion::findOrFail($id);
        return view('intranet.usuarios.gestion_conceptouopinion', compact('concepto'));
    }
    //=========================================================================================================================
    public function gestionar_reporteDeIrregularidad($id)
    {
        $reporte = Denuncia::findOrFail($id);
        return view('intranet.usuarios.gestion_reportedeirregularidades', compact('reporte'));
    }
    //=========================================================================================================================
    public function download($id_tipo_pqr, $id_pqr)
    {
        $contenido = '';
        $num = 0;
        $tipo_pqr = tipoPQR::findOrFail($id_tipo_pqr);
        switch ($tipo_pqr->id) {
            case 1:
                $pqr = PQR::findOrFail($id_pqr);
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
                $pqr = PQR::findOrFail($id_pqr);
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
                $pqr = PQR::findOrFail($id_pqr);
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
                $pqr = ConceptoUOpinion::findOrFail($id_pqr);
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
                $pqr = SolicitudDatos::findOrFail($id_pqr);
                foreach ($pqr->solicitudes as $solicitud) {
                    $num++;
                    $contenido .= '<h4>Solicitud #' . $num . '</h4>';
                    $contenido .= '<p>Tipo de solicitud: ' . $solicitud->tiposolicitud . '<p>';
                    $contenido .= '<p>Datos personales objeto de la solicitud: ' . $solicitud->datossolicitud . '<p>';
                    $contenido .= '<p>Descripción de la solicitud: ' . $solicitud->descripcionsolicitud . '<p>';
                }
                break;

            case 6:
                $pqr = Denuncia::findOrFail($id_pqr);
                $contenido .= '<h4>Denuncia</h4>';
                $contenido .= '<p>Tipo de solicitud: ' . $pqr->solicitud . '</p>';
                foreach ($pqr->hechos as $hecho) {
                    $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                }
                break;
            case 7:
                $pqr = Felicitacion::findOrFail($id_pqr);
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
                $pqr = SolicitudDocInfo::findOrFail($id_pqr);
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Petición #' . $num . '</h4>';
                    $contenido .= '<p>Tipo de petición: ' . $peticion->peticion . '<p>';
                    $contenido .= '<p>Identifique el documento o información requerida: ' . $peticion->indentifiquedocinfo . '<p>';
                    $contenido .= '<p>Justificaciones de su solicitud: ' . $peticion->justificacion . '<p>';
                }
                break;

            default:
                $pqr = Sugerencia::findOrFail($id_pqr);
                $contenido .= '<h4>Sugerencia</h4>';
                foreach ($pqr->hechos as $hecho) {
                    $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                }
                $contenido .= '<p>Escriba su sugerencia: ' . $pqr->sugerencia . '</p>';
                break;
        }
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
            ];
        }



        $pdf = PDF::loadView('intranet.usuarios.formato_pdf', $data);

        return $pdf->download('Registro de PQR.pdf');
    }
}
