<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Usuario;
use App\Models\Empresas\Empleado;
use App\Models\Juzgados\Etapa_Proceso;
use App\Models\Juzgados\Procesos;
use App\Models\Juzgados\Riesgo_Perdida;
use App\Models\Juzgados\Tipo_Proceso;
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
        $procesos = Procesos::orderBy('estado_notifi')->paginate(20);
        $riesgos_perdida = Riesgo_Perdida::get();
        $respuesta_estad_apoderados_1[] = ['label' => 'Notificado', 'y' => $procesos->where('estado_notifi', 'Sin Notificar')->count()];
        foreach ($riesgos_perdida as $riesgo) {
            $respuesta_estad_apoderados_2[] = ['label' => $riesgo->riesgo_perdida, 'y' => $procesos->where('riesgo_perdida_id', $riesgo->id)->count()];
        }

        $tipos_procesos = Tipo_Proceso::get();
        foreach ($tipos_procesos as $tipo_proc) {
            $respuesta_estad_apoderados_3[] = ['label' => $tipo_proc->tipo_proceso, 'y' => $procesos->where('tipo_proceso_id', $tipo_proc->id)->count()];
        }

        $etapas_procesos = Etapa_Proceso::get();
        foreach ($etapas_procesos as $etapa_proc) {
            $respuesta_estad_apoderados_4[] = ['label' => $etapa_proc->etapa_proceso, 'y' => $procesos->where('etapa_proceso_id', $etapa_proc->id)->count()];
        }

        if (session('rol_id') > 4) {
            $empleado = Empleado::findOrFail(session('id_usuario'));
            return view('intranet.index.index', compact('empleado'));
        } else {
            return view('intranet.index.index', compact('usuario', 'procesos', 'respuesta_estad_apoderados_1', 'respuesta_estad_apoderados_2', 'respuesta_estad_apoderados_3', 'respuesta_estad_apoderados_4'));
        }
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
