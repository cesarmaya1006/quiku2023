<?php

namespace App\Http\Controllers\Extranet;

use App\Http\Controllers\Controller;
use App\Mail\RegistroInicial;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\UsuarioTemp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        return view('extranet.registro_ini',compact('tipos_docu'));
    }
    public function registro_ini_guardar(Request $request)
    {
        $usuarioTemp = UsuarioTemp::create($request->all());
        $id =$usuarioTemp->id;
        $tipopersona =$usuarioTemp->tipo_persona;
        $cedula = $usuarioTemp->identificacion;
        Mail::to('cesarmaya99@hotmail.com')->send(new RegistroInicial($id,$tipopersona, $cedula));
        return redirect('/registro_conf');
    }
    public function registro_conf()
    {
        return view('extranet.confirmacion_reg_ini');
    }
    public function registro_ext ($id,$cc,$tipo)
    {
        $usuarioTemp = UsuarioTemp::findOrFail($id);
        if($usuarioTemp->estado==0){
            if($usuarioTemp->tipo_persona==1){
                $usuacambio['estado']=1;
        UsuarioTemp::findOrFail($id)->update($usuacambio);
                return view('extranet.registropj');
            }else{
                $usuacambio['estado']=2;
        UsuarioTemp::findOrFail($id)->update($usuacambio);
                return view('extranet.registropn');
            }
        }elseif($usuarioTemp->estado==1){
            return view('extranet.registropj');
        }else{
            return view('extranet.registropn');
        }


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
