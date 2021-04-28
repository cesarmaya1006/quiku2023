<?php

namespace App\Http\Controllers\Intranet\Usuarios;

use App\Models\PQR\PQR;
use App\Models\PQR\Anexo;
use App\Models\Admin\Pais;
use App\Models\PQR\tipoPQR;
use App\Models\PQR\Peticion;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Models\PQR\SubMotivo;
use App\Models\Admin\Tipo_Docu;
use App\Models\Productos\Marca;
use App\Models\Personas\Persona;
use App\Models\Admin\Departamento;
use App\Models\Consultas\Consulta;
use App\Models\Denuncias\Denuncia;
use App\Models\Productos\Producto;
use App\Models\Servicios\Servicio;
use App\Models\Productos\Categoria;
use App\Http\Controllers\Controller;
use App\Models\Productos\Referencia;
use App\Models\Sugerencias\Sugerencia;
use Illuminate\Support\Facades\Config;
use App\Models\Denuncias\DenunciaAnexo;
use App\Models\Denuncias\DenunciaHecho;
use App\Models\Sugerencias\SugerenciaDoc;
use App\Models\Felicitaciones\Felicitacion;
use App\Models\Sugerencias\SugerenciaHecho;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Models\Felicitaciones\FelicitacionHecho;
use App\Models\SolicitudDatos\SolicitudDatosAnexo;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use App\Models\ConceptosUOpiniones\ConceptoUOpinion;
use App\Models\SolicitudDatos\SolicitudDatosSolicitud;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoAnexo;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoPeticion;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsulta;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsultaAnexo;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsultaHecho;
use App\Models\PQR\Hecho;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pqr_S = PQR::where('persona_id', session('id_usuario'));
        $consultas = ConceptoUOpinion::where('persona_id', session('id_usuario'))->get();
        return view('intranet.usuarios.listado', compact('pqr_S', 'consultas'));
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


    public function generarPQR_guardar(Request $request)
    {
        // dd($request->all());
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
        if(isset($request['servicio_id'])){
            $nuevaPQR['servicio_id'] = $request['servicio_id'];
        }
        $nuevaPQR['fecha_generacion'] = date("Y-m-d");
        $nuevaPQR['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));
        $pqr = PQR::create($nuevaPQR);
        return redirect('/usuario/generarPQR-motivos/'.$pqr->id);
    }

    public function generarPQR_motivos($id)
    {
        $pqr = PQR::findOrFail($id);
        return view('intranet.usuarios.crearPQRMotivos', compact('pqr'));
    }

    public function generarPQR_motivos_guardar(Request $request)
    {
        // dd($request->all());
        $cantidadPeticiones = $request['cantidadmotivos'];
        $documentos = $request->allFiles();
        $contadorAnexos = 0;
        $contadorHechos = 0;
        $iteradorAnexos=0;
        $iteradorHechos=0;
        // dd($cantidadPeticiones);
        for ($i=0; $i < $cantidadPeticiones; $i++) { 
            $nuevaPQRPeticion['pqr_id'] = $request['pqr_id'];
            $nuevaPQRPeticion['motivo_sub_id'] = $request['motivo_sub_id'.$i];
            $nuevaPQRPeticion['otro'] = $request['otro'.$i];
            $nuevaPQRPeticion['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
            $nuevaPQRPeticion['fecha_respuesta'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
            $nuevaPQRPeticion['justificacion'] = $request['justificacion'.$i];
            $contadorAnexos += $request['cantidadAnexosMotivo'.$i];
            $contadorHechos += $request['cantidadHechosMotivo'.$i];
            $peticion =Peticion::create($nuevaPQRPeticion);
            for ($j=$iteradorAnexos; $j < $contadorAnexos; $j++) { 
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
                    $nuevo_documento['descripcion'] = $request["descripcion$j"];
                    $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                    $nuevo_documento['peso'] = $tamaño;
                    $nuevo_documento['url'] = $nombre_doc;
                    $doc_subido->move($ruta, $nombre_doc);
                    Anexo::create($nuevo_documento);
                }
            }
            for ($k=$iteradorHechos; $k < $contadorHechos; $k++) { 
                $nuevosHechos['peticion_id'] = $peticion->id;
                $nuevosHechos['hecho'] = $request['hecho' . $k];
                Hecho::create($nuevosHechos);
            }
            $iteradorAnexos += $request['cantidadAnexosMotivo'.$i];
            $iteradorHechos += $request['cantidadHechosMotivo'.$i];
        }
        $tipoPQR = tipoPQR::all();
        return view('intranet.usuarios.crear', compact('tipoPQR'));
    }

    public function generarConceptoUOpinion()
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        return view('intranet.usuarios.crearConceptoUOpinion', compact('usuario'));
    }

    public function generarConceptoUOpinion_guardar(Request $request)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaConcepto['persona_id'] = $usuario->id;
        } else {
            $nuevaConcepto['empresa_id'] = $usuario->id;
        }
        $nuevaConcepto['fecha_generacion'] = date("Y-m-d");
        $nuevaConcepto['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $concepto = ConceptoUOpinion::create($nuevaConcepto);
        $nuevasConsultas['conceptouopinion_id'] = $concepto->id;
        $cantidadConsultas = $request['cantidadConsultas'];
        $documentos = $request->allFiles();
        $contadorAnexos = 0;
        $contadorHechos = 0;
        $iteradorAnexos=0;
        $iteradorHechos=0;
        for ($i=0; $i < $cantidadConsultas; $i++) { 
            $nuevasConsultas['consulta'] = $request['consulta'.$i];
            $contadorAnexos += $request['cantidadAnexosConsulta'.$i];
            $contadorHechos += $request['cantidadHechosConsulta'.$i];
            $consulta =ConceptoUOpinionConsulta::create($nuevasConsultas);
            for ($j=$iteradorAnexos; $j < $contadorAnexos; $j++) { 
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
                    $nuevo_documento['descripcion'] = $request["descripcion$j"];
                    $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                    $nuevo_documento['peso'] = $tamaño;
                    $nuevo_documento['url'] = $nombre_doc;
                    $doc_subido->move($ruta, $nombre_doc);
                    ConceptoUOpinionConsultaAnexo::create($nuevo_documento);
                }
            }
            for ($k=$iteradorHechos; $k < $contadorHechos; $k++) { 
                $nuevosHechos['conceptouopinionconsultas_id'] = $consulta->id;
                $nuevosHechos['hecho'] = $request['hecho' . $k];
                ConceptoUOpinionConsultaHecho::create($nuevosHechos);
            }
            $iteradorAnexos += $request['cantidadAnexosConsulta'.$i];
            $iteradorHechos += $request['cantidadHechosConsulta'.$i];
        }
        return view('intranet.usuarios.crearConceptoUOpinion');
    }

    public function generarFelicitacion()
    {
        return view('intranet.usuarios.crearFeclicitaciones');
    }

    public function generarFelicitacion_guardar(Request $request)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaFelicitacion['persona_id'] = $usuario->id;
        } else {
            $nuevaFelicitacion['empresa_id'] = $usuario->id;
        }
        $nuevaFelicitacion['nombre_funcionario'] = $request['nombre_funcionario'];
        $nuevaFelicitacion['sede'] = $request['sede'];
        $nuevaFelicitacion['felicitacion'] = $request['felicitacion'];
        $nuevaFelicitacion['fecha_generacion'] = date("Y-m-d");
        $nuevaFelicitacion['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $felicitacion = Felicitacion::create($nuevaFelicitacion);
        $nuevosHechos['felicitacion_id'] = $felicitacion->id;
        $cantidadHechos = $request['cantidadHechos'];
        for ($i = 0; $i < $cantidadHechos; $i++) {
            $nuevosHechos['hecho'] = $request['hecho' . $i];
            FelicitacionHecho::create($nuevosHechos);
        }
        return view('intranet.usuarios.crearFeclicitaciones');
    }

    public function gererarDenuncia()
    {
        return view('intranet.usuarios.crearDenuncia');
    }

    public function gererarDenuncia_guardar(Request $request)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaDenuncia['persona_id'] = $usuario->id;
        } else {
            $nuevaDenuncia['empresa_id'] = $usuario->id;
        }
        $nuevaDenuncia['solicitud'] = $request['solicitud'];
        $nuevaDenuncia['fecha_generacion'] = date("Y-m-d");
        $nuevaDenuncia['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $denuncia = Denuncia::create($nuevaDenuncia);
        $nuevosHechos['denuncia_id'] = $denuncia->id;
        $cantidadHechos = $request['cantidadHechos'];
        for ($i = 0; $i < $cantidadHechos; $i++) {
            $nuevosHechos['hecho'] = $request['hecho' . $i];
            DenunciaHecho::create($nuevosHechos);
        }
        $cantidadAnexosHechos = $request['cantidadAnexosHechos'];
        $documentos = $request->allFiles();
        for ($i = 0; $i < $cantidadAnexosHechos; $i++) {
            if ($request->hasFile("documentos$i")) {
                $ruta = Config::get('constantes.folder_doc_denuncias');
                $ruta = trim($ruta);
                $doc_subido = $documentos["documentos$i"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_documento['denuncia_id'] = $denuncia->id;
                $nuevo_documento['titulo'] = $request["titulo$i"];
                $nuevo_documento['descripcion'] = $request["descripcion$i"];
                $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                $nuevo_documento['peso'] = $tamaño;
                $nuevo_documento['url'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
                DenunciaAnexo::create($nuevo_documento);
            }
        }
        return view('intranet.usuarios.crearDenuncia');
    }

    public function generarSolicitudDatos()
    {
        return view('intranet.usuarios.crearSolicitudDatos');
    }

    public function generarSolicitudDatos_guardar(Request $request)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaSolicitud['persona_id'] = $usuario->id;
        } else {
            $nuevaSolicitud['empresa_id'] = $usuario->id;
        }
        $nuevaSolicitud['fecha_generacion'] = date("Y-m-d");
        $nuevaSolicitud['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $solicitud = SolicitudDatos::create($nuevaSolicitud);
        $nuevasSolicitudes['solicituddatos_id'] = $solicitud->id;
        $cantidadSolicitudes = $request['cantidadSolicitudes'];
        $documentos = $request->allFiles();
        $contadorAnexos = 0;
        $iterador=0;
        for ($i=0; $i < $cantidadSolicitudes; $i++) { 
            $nuevasSolicitudes['tiposolicitud'] = $request['tiposolicitud'.$i];
            $nuevasSolicitudes['datossolicitud'] = $request['datossolicitud'.$i];
            $nuevasSolicitudes['descripcionsolicitud'] = $request['descripcionsolicitud'.$i];
            $contadorAnexos += $request['cantidadAnexosSolicitud'.$i];
            $solicitud =SolicitudDatosSolicitud::create($nuevasSolicitudes);
            for ($j=$iterador; $j < $contadorAnexos; $j++) { 
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
                    $nuevo_documento['descripcion'] = $request["descripcion$j"];
                    $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                    $nuevo_documento['peso'] = $tamaño;
                    $nuevo_documento['url'] = $nombre_doc;
                    $doc_subido->move($ruta, $nombre_doc);
                    SolicitudDatosAnexo::create($nuevo_documento);
                }
            }
            $iterador += $request['cantidadAnexosSolicitud'.$i];
        }
        return view('intranet.usuarios.crearSolicitudDatos');
    }

    public function generarSolicitudDocumentos()
    {
        return view('intranet.usuarios.crearSolicitudDocumentos');
    }

    public function generarSolicitudDocumentos_guardar(Request $request)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaSolicitud['persona_id'] = $usuario->id;
        } else {
            $nuevaSolicitud['empresa_id'] = $usuario->id;
        }
        $nuevaSolicitud['fecha_generacion'] = date("Y-m-d");
        $nuevaSolicitud['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $solicitud = SolicitudDocInfo::create($nuevaSolicitud);
        $nuevasPeticiones['solicituddocinfo_id'] = $solicitud->id;
        $cantidadPeticiones = $request['cantidadPeticiones'];
        $documentos = $request->allFiles();
        $contadorAnexos = 0;
        $iterador=0;
        for ($i=0; $i < $cantidadPeticiones; $i++) { 
            $nuevasPeticiones['peticion'] = $request['peticion'.$i];
            $nuevasPeticiones['indentifiquedocinfo'] = $request['indentifiquedocinfo'.$i];
            $nuevasPeticiones['justificacion'] = $request['justificacion'.$i];
            $contadorAnexos += $request['cantidadAnexosSolicitud'.$i];
            $peticion =SolicitudDocInfoPeticion::create($nuevasPeticiones);
            for ($j=$iterador; $j < $contadorAnexos; $j++) { 
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
                    $nuevo_documento['descripcion'] = $request["descripcion$j"];
                    $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                    $nuevo_documento['peso'] = $tamaño;
                    $nuevo_documento['url'] = $nombre_doc;
                    $doc_subido->move($ruta, $nombre_doc);
                    SolicitudDocInfoAnexo::create($nuevo_documento);
                }
            }
            $iterador += $request['cantidadAnexosSolicitud'.$i];
        }
        return view('intranet.usuarios.crearSolicitudDocumentos');
    }

    public function generarSugerencia()
    {
        return view('intranet.usuarios.crearSugerencia');
    }

    public function generarSugerencia_guardar(Request $request)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaSugerencia['persona_id'] = $usuario->id;
        } else {
            $nuevaSugerencia['empresa_id'] = $usuario->id;
        }
        $nuevaSugerencia['sugerencia'] = $request['sugerencia'];
        $nuevaSugerencia['fecha_generacion'] = date("Y-m-d");
        $nuevaSugerencia['fecha_radicado'] = date("Y-m-d", strtotime(date("Y-m-d") . "+ 1 days"));;
        $sugerencia = Sugerencia::create($nuevaSugerencia);
        $nuevosHechos['denuncia'] = $sugerencia->id;
        $cantidadHechos = $request['cantidadHechos'];
        for ($i = 0; $i < $cantidadHechos; $i++) {
            $nuevosHechos['hecho'] = $request['hecho' . $i];
            SugerenciaHecho::create($nuevosHechos);
        }
        $cantidadAnexosHechos = $request['cantidadAnexosHechos'];
        $documentos = $request->allFiles();
        for ($i = 0; $i < $cantidadAnexosHechos; $i++) {
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
                $nuevo_documento['descripcion'] = $request["descripcion$i"];
                $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                $nuevo_documento['peso'] = $tamaño;
                $nuevo_documento['url'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
                SugerenciaDoc::create($nuevo_documento);
            }
        }
        return view('intranet.usuarios.crearSugerencia');
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
}
