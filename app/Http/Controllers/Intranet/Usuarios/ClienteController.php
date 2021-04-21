<?php

namespace App\Http\Controllers\Intranet\Usuarios;

use App\Models\PQR\PQR;
use App\Models\Admin\Pais;
use App\Models\PQR\tipoPQR;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Models\PQR\SubMotivo;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Departamento;
use App\Models\Consultas\Consulta;
use App\Http\Controllers\Controller;
use App\Models\Consultas\ConsultaDoc;
use App\Models\Sugerencias\Sugerencia;
use Illuminate\Support\Facades\Config;
use App\Models\Sugerencias\SugerenciaDoc;
use App\Models\Felicitaciones\Felicitacion;
use App\Models\Sugerencias\SugerenciaHecho;
use App\Models\Felicitaciones\FelicitacionHecho;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoPeticion;

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
        $consultas = Consulta::where('persona_id', session('id_usuario'))->get();
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
        return view('intranet.usuarios.crearPQR', compact('usuario', 'tipo_pqr', 'departamentos'));
    }

    public function generarConsulta()
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        return view('intranet.usuarios.crearConsulta', compact('usuario'));
    }
    public function generarConsulta_guardar(Request $request)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaConsulta['persona_id'] = $request['persona_id'];
        } else {
            $nuevaConsulta['empresa_id'] = $request['empresa_id'];
        }
        $nuevaConsulta['consulta'] = $request['consulta'];
        $nuevaConsulta['justificacion'] = $request['justificacion'];
        $nuevaConsulta['fecha_generacion'] = $request['fecha_generacion'];
        $nuevaConsulta['fecha_radicado'] = $request['fecha_radicado'];
        $consulta_nueva = Consulta::create($nuevaConsulta);
        $tamaño_f = 0;
        if ($request->hasFile('documentos')) {
            $ruta = Config::get('constantes.folder_doc_consultas');
            $ruta = trim($ruta);
            $ruta = trim($ruta);
            $doc_subido = $request->documentos;
            $tamaño = $doc_subido->getSize();
            if ($tamaño > 0) {
                $tamaño = $tamaño / 1000;
            }
            $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
            $nuevo_documento['consulta_id'] = $consulta_nueva->id;
            $nuevo_documento['titulo'] = $request['titulo'];
            $nuevo_documento['descripcion'] = $request['descripcion'];
            $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
            $nuevo_documento['peso'] = $tamaño;
            $nuevo_documento['url'] = $nombre_doc;
            $doc_subido->move($ruta, $nombre_doc);
            $tamaño_f += $tamaño;
            ConsultaDoc::create($nuevo_documento);
        }
        return redirect('usuario/index')->with('mensaje', 'Se registro la consulta de manera correcta tamaño archivos:' . $tamaño_f);
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
        $nuevaFelicitacion['fecha_generacion'] = date("Y-m-d") ;
        $nuevaFelicitacion['fecha_radicado'] = date("Y-m-d",strtotime(date("Y-m-d") . "+ 1 days")); ;
        $felicitacion = Felicitacion::create($nuevaFelicitacion);
        $nuevosHechos['felicitacion_id'] = $felicitacion->id;
        $cantidadHechos = $request['cantidadHechos'];
        for ($i=0; $i < $cantidadHechos; $i++) { 
            $nuevosHechos['hecho'] = $request['hecho'.$i];
            FelicitacionHecho::create($nuevosHechos);
        }
        return view('intranet.usuarios.crearFeclicitaciones');
    }

    public function gererarDenuncia()
    {
        return view('intranet.usuarios.crearDenuncia');
    }

    public function generarSolicitudDatos()
    {
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
        $nuevaSolicitudPeticion['solicitudDocInfo_id'] = $solicitud->id;
        $nuevaSolicitudPeticion['peticion'] = $request['peticion'];
        $nuevaSolicitudPeticion['indentifiqueDocInfo'] = $request['indentifiqueDocInfo'];
        $nuevaSolicitudPeticion['justificacion'] = $request['justificacion'];
        $solicitudPeticion = SolicitudDocInfoPeticion::create($nuevaSolicitudPeticion);
        dd($request->all());
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
        $nuevosHechos['sugerencia_id'] = $sugerencia->id;
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
}
