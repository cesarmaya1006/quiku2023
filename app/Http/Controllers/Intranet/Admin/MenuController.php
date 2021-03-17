<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionMenu;
use App\Models\Admin\Icono;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::getMenu();
        return view('intranet.sistema.menu.index', compact('menus'));
    }

    public function crear()
    {
        $data = NULL;
        $iconos = Icono::orderBy('nom_icono')->get();
        return view('intranet.sistema.menu.crear', compact('iconos', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionMenu $request)
    {
        $pagVolver = 'admin-menu-index';
        Menu::create($request->all());
        return Redirect('admin/menu-crear/' . $pagVolver)->with('mensaje', 'Menú creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $iconos = Icono::orderBy('nom_icono')->get();
        $data = Menu::findOrFail($id);
        return view('intranet.sistema.menu.editar', compact('data', 'iconos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionMenu $request, $id)
    {
        Menu::findOrFail($id)->update($request->all());
        $menus = Menu::getMenu();
        return redirect('admin/menu-index')->with('mensaje', 'Menú actualizado con exito')->with('menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $menus = Menu::getMenu();
        Menu::destroy($id);
        return redirect('admin/menu-index')->with('mensaje', 'Menú eliminado con exito')->with('menus');
    }

    public function guardarOrden(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->guardarOrden($request->menu);
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
    public function pruebaAjax(Request $request)
    {
        dd('si');
        $input = $request->all();
        return response()->json(['success' => 'Got Simple Ajax Request.']);
    }
}
