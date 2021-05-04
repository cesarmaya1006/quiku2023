<?php

namespace App\Http\Controllers\Extranet;

use App\Models\Admin\Pais;
use Illuminate\Http\Request;
use App\Mail\RegistroInicial;
use App\Models\Admin\Usuario;
use App\Models\Empresas\Sede;
use App\Models\Admin\Municipio;
use App\Models\Admin\Parametro;
use App\Models\Admin\Tipo_Docu;
use App\Models\Empresas\Empresa;
use App\Models\Personas\Persona;
use App\Mail\RecuperarContraseña;
use App\Models\Admin\UsuarioTemp;
use App\Models\Admin\Departamento;
use App\Models\Empleados\Empleado;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Empresas\Representante;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\ValidarPersonaJur;
use App\Http\Requests\ValidarPersonaNat;
use App\Http\Requests\ValidarRegistroIni;
use App\Http\Requests\ValidarRepresentanteLegal;
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

    public function solicitar_password()
    {
        $tipos_docu = Tipo_Docu::get();
        // dd($tipos_docu);
        return view('extranet.solicitar_password', compact('tipos_docu'));
    }

    public function cambiar_password(Request $request)
    {
        //Carácteres para la contraseña
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";
        //Reconstruimos la contraseña segun la longitud que se quiera
        for ($i = 0; $i < 10; $i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $password .= substr($str, rand(0, 62), 1);
        }
        $usuario_camb['camb_password'] = 1;
        $usuario_camb['password'] = bcrypt(utf8_encode($password));

        $personas = Persona::where('docutipos_id', $request['docutipos_id'])
            ->where('identificacion', $request['identificacion'])
            ->where('email', $request['email'])->get();
        $representantes = Representante::where('docutipos_id', $request['docutipos_id'])
            ->where('identificacion', $request['identificacion'])
            ->where('email', $request['email'])->get();
        $empleados = Empleado::where('docutipos_id', $request['docutipos_id'])
            ->where('identificacion', $request['identificacion'])
            ->where('email', $request['email'])->get();
        if ($personas->count() > 0) {
            foreach ($personas as $persona) {
                $id = $persona->id;
            }
        } elseif ($representantes->count() > 0) {
            foreach ($representantes as $representante) {
                $id = $representante->id;
            }
        } else {
            foreach ($empleados as $empleado) {
                $id = $empleado->id;
            }
        }

        Usuario::findOrFail($id)->update($usuario_camb);
        $usuario = Usuario::findOrFail($id);
        //produccion Pruebas
        //$headers =  'MIME-Version: 1.0' . "\r\n";
        //$headers .= 'From: Your name <info@quiku.com>' . "\r\n";
        //$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        //$mensaje = $this->mensajeRecuperarContraseña($usuario->usuario,$password);
        //$para = 'cesarmaya99@hotmail.com';
        //$titulo = 'Recuperar contraseña plataforma Quiku';
        //mail($para, $titulo, $mensaje, $headers);
        Mail::to('ruizwilson01@gmail.com')->send(new RecuperarContraseña($usuario->usuario, $password));
        return redirect('/index')->with('mensaje', 'Verifique su correo e ingrese a la plataforma nuevamente');
    }

    public function preguntas_frecuentes()
    {
        return view('extranet.preguntas_frecuentes');
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
        // -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        //produccion Pruebas
        //$headers =  'MIME-Version: 1.0' . "\r\n";
        //$headers .= 'From: Your name <info@address.com>' . "\r\n";
        //$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        //$mensaje = $this->mensajeRegistroinicial($id, $tipopersona, $cedula);
        //$para = 'jgmedina73@gmail.com';
        //$titulo = 'Registro plataforma Quiku';
        //mail($para, $titulo, $mensaje, $headers);
        // -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        // Desarrollo
        Mail::to('ruizwilson01@gmail.com')->send(new RegistroInicial($id, $tipopersona, $cedula));
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
                return view('extranet.registropj', compact('tipos_docu', 'docutipos_id', 'identificacion', 'email', 'paises', 'departamentos'));
            } else {
                $usuacambio['estado'] = 2;
                UsuarioTemp::findOrFail($id)->update($usuacambio);
                return view('extranet.registropn', compact('tipos_docu', 'docutipos_id', 'identificacion', 'email', 'paises', 'departamentos'));
            }
        } elseif ($usuarioTemp->estado == 1) {
            return view('extranet.registropj', compact('tipos_docu', 'docutipos_id', 'identificacion', 'email', 'paises', 'departamentos'));
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

    public function registropj_guardar(ValidarPersonaJur $request)
    {
        $empresa = Empresa::create($request->all());

        return redirect('/registro_rep/' . $empresa->id);
    }

    public function registro_rep($id)
    {
        $tipos_docu = Tipo_Docu::get();
        $paises = Pais::get();
        $departamentos = Departamento::get();
        return view('extranet.registrorl', compact('tipos_docu', 'paises', 'departamentos', 'id'));
    }
    public function registrorep_guardar(ValidarRepresentanteLegal $request)
    {
        $nuevoUsuario['usuario'] = $request['usuario'];
        $nuevoUsuario['password'] = bcrypt(utf8_encode($request['password']));

        $usuario = Usuario::create($nuevoUsuario);
        $roles['rol_id'] = 6;
        $usuario->roles()->sync($roles);

        $nuevaPersona['id'] = $usuario->id;
        $nuevaPersona['docutipos_id'] = $request['docutipos_id'];
        $nuevaPersona['identificacion'] = $request['identificacion'];
        $nuevaPersona['nombre1'] = $request['nombre1'];
        $nuevaPersona['nombre2'] = $request['nombre2'];
        $nuevaPersona['apellido1'] = $request['apellido1'];
        $nuevaPersona['apellido2'] = $request['apellido2'];
        $nuevaPersona['telefono_fijo'] = $request['telefono_fijo'];
        $nuevaPersona['telefono_celu'] = $request['telefono_celu'];
        $nuevaPersona['direccion'] = $request['direccion'];
        $nuevaPersona['pais_id'] = $request['pais'];
        $nuevaPersona['municipio_id'] = $request['municipio_id'];
        $nuevaPersona['nacionalidad'] = $request['nacionalidad'];
        $nuevaPersona['grado'] = $request['grado'];
        $nuevaPersona['genero'] = $request['genero'];
        $nuevaPersona['fecha_nacimiento'] = $request['fecha_nacimiento'];
        $nuevaPersona['grupo_etnico'] = $request['grupo_etnico'];
        if ($request['discapasidad'] == 'no') {
            $nuevaPersona['discapacidad'] = 0;
        } else {
            $nuevaPersona['discapacidad'] = 1;
        }
        $nuevaPersona['tipo_discapacidad'] = $request['tipo_discapacidad'];
        $nuevaPersona['email'] = $request['email'];

        $representante = Representante::create($nuevaPersona);
        $empresaUpdate['representante_id'] = $representante->id;
        Empresa::findOrFail($request['representante_id'])->update($empresaUpdate);

        return redirect('/index')->with('mensaje', 'Registro exitoso lo invitamos a ingresar a nuestra plataforma');
    }

    public function registro_pn()
    {
        return view('extranet.registropn');
    }
    public function registropn_guardar(ValidarPersonaNat $request)
    {

        $nuevoUsuario['usuario'] = $request['usuario'];
        $nuevoUsuario['password'] = bcrypt(utf8_encode($request['password']));

        $usuario = Usuario::create($nuevoUsuario);
        $roles['rol_id'] = 6;
        $usuario->roles()->sync($roles);

        $nuevaPersona['id'] = $usuario->id;
        $nuevaPersona['docutipos_id'] = $request['docutipos_id'];
        $nuevaPersona['identificacion'] = $request['identificacion'];
        $nuevaPersona['nombre1'] = $request['primernombre'];
        $nuevaPersona['nombre2'] = $request['segundonombre'];
        $nuevaPersona['apellido1'] = $request['primerapellido'];
        $nuevaPersona['apellido2'] = $request['segundoapelldio'];
        $nuevaPersona['telefono_fijo'] = $request['telefonofijo'];
        $nuevaPersona['telefono_celu'] = $request['telefonocelular'];
        $nuevaPersona['direccion'] = $request['direccion'];
        $nuevaPersona['pais_id'] = $request['pais'];
        $nuevaPersona['municipio_id'] = $request['municipio_id'];
        $nuevaPersona['nacionalidad'] = $request['nacionalidad'];
        $nuevaPersona['grado_educacion'] = $request['grado'];
        $nuevaPersona['genero'] = $request['genero'];
        $nuevaPersona['fecha_nacimiento'] = $request['fechanacimiento'];
        $nuevaPersona['grupo_etnico'] = $request['grupoetnico'];
        if ($request['discapasidad'] == 'no') {
            $nuevaPersona['discapacidad'] = 0;
        } else {
            $nuevaPersona['discapacidad'] = 1;
        }
        $nuevaPersona['tipo_discapacidad'] = $request['tipodiscapacidad'];
        $nuevaPersona['email'] = $request['email'];

        Persona::create($nuevaPersona);


        return redirect('/index')->with('mensaje', 'Registro exitoso lo invitamos a ingresar a nuestra plataforma');
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

    public function cargar_sedes(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Sede::where('municipio_id', $id)->orderBy('nombre')->get();
        }
    }
    
    public function mensajeRegistroinicial($id, $cedula, $tipopersona)
    {
        $mensaje = '<html lang="es">' . "\r\n";
        $mensaje .= '<head>' . "\r\n";
        $mensaje .= '<meta charset="utf-8">' . "\r\n";
        $mensaje .= '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\r\n";
        $mensaje .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">' . "\r\n";
        $mensaje .= '<title>LegalProceedings</title>' . "\r\n";
        $mensaje .= '</head>' . "\r\n";
        $mensaje .= '<body>' . "\r\n";
        $mensaje .= '<div class="row">' . "\r\n";
        $mensaje .= '<div class="col-12">' . "\r\n";
        $mensaje .= '<h1>Bienvenido al sistema de PQR</h1>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<p>Estimado Usuario. Ha solicitado registrarse a nuestro aplicativo para presentar Peticiones, Quejas o Reclamos, para continuar con su registro por favor dar clic sobre el enlace o c&oacute;pielo y p&eacute;guelo en su explorador web para continuar con el registro.</p>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<a href="' . route('registro_ext', ['id' => $id, 'cc' => $cedula, 'tipo' => $tipopersona]) . '" target="_blank" rel="noopener noreferrer">' . route('registro_ext', ['id' => $id, 'cc' => $cedula, 'tipo' => $tipopersona]) . '</a>' . "\r\n";
        $mensaje .= '</div>' . "\r\n";
        $mensaje .= '</div>' . "\r\n";
        $mensaje .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>' . "\r\n";

        $mensaje .= '</body>' . "\r\n";
        $mensaje .= '</html>' . "\r\n";

        return $mensaje;
    }

    public function mensajeRecuperarContraseña($usuario, $password)
    {
        $mensaje = '<html lang="es">' . "\r\n";
        $mensaje .= '<head>' . "\r\n";
        $mensaje .= '<meta charset="utf-8">' . "\r\n";
        $mensaje .= '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\r\n";
        $mensaje .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">' . "\r\n";
        $mensaje .= '<title>LegalProceedings</title>' . "\r\n";
        $mensaje .= '</head>' . "\r\n";
        $mensaje .= '<body>' . "\r\n";
        $mensaje .= '<div class="row">' . "\r\n";
        $mensaje .= '<div class="col-12">' . "\r\n";
        $mensaje .= '<h1>Sistema PQR</h1>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<p>Estimado Usuario. Hemos rebicido una solicitud con este correo para generar una nueva contraseña o para recordar su usuario.</p>' . "\r\n";
        $mensaje .= '<p>El sistema a generado una contraseña temporal ingrese con esta contraseña y cambie nuevamenete la contraseña por una de su eleccion.</p>' . "\r\n";
        $mensaje .= '<br>' . "\r\n";
        $mensaje .= '<p>Usuario: ' . $usuario . '</p>' . "\r\n";
        $mensaje .= '<p>Contraseña temporal: ' . $password . '</p>' . "\r\n";
        $mensaje .= '</div>' . "\r\n";
        $mensaje .= '</div>' . "\r\n";
        $mensaje .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>' . "\r\n";

        $mensaje .= '</body>' . "\r\n";
        $mensaje .= '</html>' . "\r\n";

        return $mensaje;
    }
}
