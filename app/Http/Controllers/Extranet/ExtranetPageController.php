<?php

namespace App\Http\Controllers\Extranet;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarRegistroIni;
use App\Mail\RegistroInicial;
use App\Models\Admin\Departamento;
use App\Models\Admin\Municipio;
use App\Models\Admin\Pais;
use App\Models\Admin\Parametro;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\UsuarioTemp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image as InterventionImage;

class ExtranetPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('extranet.acceso');
    }
    public function index_3()
    {
        $tipos_docu = Tipo_Docu::get();
        $parametro = Parametro::findOrFail(1);
        return view('extranet.acceso2', compact('parametro', 'tipos_docu'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restablecer()
    {
        return view('extranet.restablecer');
    }

    public function registro_ini()
    {
        $tipos_docu = Tipo_Docu::get();
        return view('extranet.registro_ini', compact('tipos_docu'));
    }
    public function registro_ini_guardar(ValidarRegistroIni $request)
    {
        $usuarioTemp = UsuarioTemp::create($request->all());
        $id = $usuarioTemp->id;
        $tipopersona = $usuarioTemp->tipo_persona;
        $cedula = $usuarioTemp->identificacion;
        Mail::to('cesarmaya99@hotmail.com')->send(new RegistroInicial($id, $tipopersona, $cedula));
        return redirect('/registro_conf');
    }
    public function registro_conf()
    {
        return view('extranet.confirmacion_reg_ini');
    }
    public function registro_ext($id, $cc, $tipo)
    {
        $usuarioTemp = UsuarioTemp::findOrFail($id);
        $docutipos_id = $usuarioTemp->docutipos_id;
        $identificacion = $usuarioTemp->identificacion;
        $email = $usuarioTemp->email;
        $tipos_docu = Tipo_Docu::get();
        $paises = Pais::get();
        $departamentos = Departamento::get();
        if ($usuarioTemp->estado == 0) {
            if ($usuarioTemp->tipo_persona == 1) {
                $usuacambio['estado'] = 1;
                UsuarioTemp::findOrFail($id)->update($usuacambio);
                return view('extranet.registropj', compact('tipos_docu'));
            } else {
                $usuacambio['estado'] = 2;
                UsuarioTemp::findOrFail($id)->update($usuacambio);
                return view('extranet.registropn', compact('tipos_docu', 'docutipos_id', 'identificacion', 'email', 'paises', 'departamentos'));
            }
        } elseif ($usuarioTemp->estado == 1) {
            return view('extranet.registropj');
        } else {
            return view('extranet.registropn', compact('tipos_docu', 'docutipos_id', 'identificacion', 'email', 'paises', 'departamentos'));
        }
    }

    public function parametros()
    {
        $parametro = Parametro::findOrFail(1);
        return view('extranet.parametros', compact('parametro'));
    }
    public function parametros_guardar(Request $request)
    {
        $ruta = Config::get('constantes.folder_imagenes_sistema');
        $ruta = trim($ruta);
        //imagen
        //----------------------------
        if ($request->hasFile('logo')) {
            $imagen_nueva = $request->logo;
            $imagen_nueva_archivo = InterventionImage::make($imagen_nueva);
            $imagen_nueva_bd = time() . $imagen_nueva->getClientOriginalName();
            $imagen_nueva_archivo->resize(600, 600);
            $imagen_nueva_archivo->save($ruta . $imagen_nueva_bd, 100);
            $parametros_update['logo'] = $imagen_nueva_bd;
        }
        //----------------------------
        $parametros_update['bg_titulo'] = $request['bg_titulo'];
        $parametros_update['color_titulo'] = $request['color_titulo'];
        $parametros_update['titulo'] = $request['titulo'];
        $parametros_update['bg_caja'] = $request['bg_caja'];
        $parametros_update['bg_botones'] = $request['bg_botones'];
        $parametros_update['color_botones'] = $request['color_botones'];
        $parametros_update['color_titulos'] = $request['color_titulos'];
        $parametros_update['color_texto'] = $request['color_titulos'];
        $parametros_update['fondo1'] = $request['fondo1'];
        $parametros_update['fondo2'] = $request['fondo2'];
        Parametro::findOrFail(1)->update($parametros_update);
        return redirect('/parametros')->with('mensaje', 'Parametros modificados con exito');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function registro_pj()
    {
        return view('extranet.registropj');
    }


    public function registro_rep()
    {
        return view('extranet.registrorl');
    }


    public function registro_pn()
    {
        return view('extranet.registropn');
    }
    public function registropn_guardar(Request $request)
    {
        dd($request->all());
    }



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

    public function cargar_municipios(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Municipio::where('departamento_id', $id)->orderBy('municipio')->get();
        }
    }
}
