<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarPassword;
use App\Models\Admin\Usuario;
use App\Models\ConceptosUOpiniones\ConceptoUOpinion;
use App\Models\Consultas\Consulta;
use App\Models\Denuncias\Denuncia;
use App\Models\Felicitaciones\Felicitacion;
use App\Models\PQR\PQR;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use App\Models\Sugerencias\Sugerencia;
use Illuminate\Http\Request;

class IntranetPageCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        if (session('rol_id') == 6) {
            if ($usuario->persona->count() > 0) {
                $pqr_S = PQR::where('persona_id', session('id_usuario'))->get();
                $consultas = ConceptoUOpinion::where('persona_id', session('id_usuario'))->get();
                $sugerecias = Sugerencia::where('persona_id', session('id_usuario'))->get();
            } else {
                foreach ($usuario->representante->empresas as $empresa) {
                    $pqr_S = PQR::where('empresa_id', $empresa->id)->get();
                    $consultas = ConceptoUOpinion::where('empresa_id', $empresa->id)->get();
                    $sugerecias = Sugerencia::where('empresa_id', $empresa->id)->get();
                }
            }
        } elseif (session('rol_id') == 5) {
            $pqr_S = PQR::all();
            $conceptos = ConceptoUOpinion::all();
            $solicitudes_datos = SolicitudDatos::all();
            $denuncias = Denuncia::all();
            $felicitaciones = Felicitacion::all();
            $solicitudes_doc = SolicitudDocInfo::all();
            $sugerencias = Sugerencia::all();
        } elseif (session('rol_id') < 4) {
            $pqr_S = PQR::where('empleado_id', session('id_usuario'))->get();
            $consultas = ConceptoUOpinion::where('empleado_id', session('id_usuario'))->get();
            $sugerecias = Sugerencia::where('empleado_id', session('id_usuario'))->get();
        }
        return view('intranet.index.index', compact('pqr_S', 'conceptos', 'solicitudes_datos', 'denuncias', 'felicitaciones', 'solicitudes_doc', 'sugerencias','usuario'));
    }

    public function restablecer_password(ValidarPassword $request)
    {
        $nuevoPassword['password'] = bcrypt(utf8_encode($request['password1']));
        $nuevoPassword['camb_password'] = 0;
        Usuario::findOrFail($request['id'])->update($nuevoPassword);
        return redirect('admin/index')->with('mensaje', 'Se cambio la contraseña de manera exitosa en la plataforma');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
}
