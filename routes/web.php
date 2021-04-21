<?php

use App\Http\Controllers\Extranet\ExtranetPageController;
use App\Http\Controllers\Intranet\Admin\IntranetPageCotroller;
use App\Http\Controllers\Intranet\Admin\MenuController;
use App\Http\Controllers\Intranet\Admin\MenuRolController;
use App\Http\Controllers\Intranet\Admin\PermisoController;
use App\Http\Controllers\Intranet\Admin\PermisoRolController;
use App\Http\Controllers\Intranet\Admin\RolController;
use App\Http\Controllers\Intranet\Admin\UsuarioController;
use App\Http\Controllers\Intranet\Funcionarios\FuncionarioController;
use App\Http\Controllers\Intranet\Usuarios\ClienteController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
});
//---------------------------------------------------------------------------------
Route::get('/', [ExtranetPageController::class, 'index'])->name('index');
Route::get('/index', [ExtranetPageController::class, 'index'])->name('index_2');
Route::get('/solicitar_password', [ExtranetPageController::class, 'solicitar_password'])->name('solicitar_password');
Route::post('/cambiar_password', [ExtranetPageController::class, 'cambiar_password'])->name('cambiar_password');
Route::get('/preguntas_frecuentes', [ExtranetPageController::class, 'preguntas_frecuentes'])->name('preguntas_frecuentes');
Route::get('/index3', [ExtranetPageController::class, 'index_3'])->name('index_3');
Route::get('/registro_ini', [ExtranetPageController::class, 'registro_ini'])->name('registro_ini');
Route::post('/registro_ini-guardar', [ExtranetPageController::class, 'registro_ini_guardar'])->name('registro_ini-guardar');
Route::get('/registro_ext/{id}/{cc}/{tipo}', [ExtranetPageController::class, 'registro_ext'])->name('registro_ext');
Route::get('/registro_conf', [ExtranetPageController::class, 'registro_conf'])->name('registro_conf');
Route::get('/parametros', [ExtranetPageController::class, 'parametros'])->name('parametros');
Route::post('/parametros-guardar', [ExtranetPageController::class, 'parametros_guardar'])->name('parametros-guardar');
Route::post('/registropj-guardar', [ExtranetPageController::class, 'registropj_guardar'])->name('registropj-guardar');
Route::post('/registrorep-guardar', [ExtranetPageController::class, 'registrorep_guardar'])->name('registrorep-guardar');
Route::post('/registropn-guardar', [ExtranetPageController::class, 'registropn_guardar'])->name('registropn-guardar');
Route::get('/registro_pj', [ExtranetPageController::class, 'registro_pj'])->name('registro_pj');
Route::get('/registro_rep/{id}', [ExtranetPageController::class, 'registro_rep'])->name('registro_rep');
Route::get('/registro_pn', [ExtranetPageController::class, 'registro_pn'])->name('registro_pn');
Route::get('/cargar_municipios', [ExtranetPageController::class, 'cargar_municipios'])->name('cargar_municipios');
Route::get('/registro_final_pn', [ExtranetPageController::class, 'registro_final_pn'])->name('registro_final_pn');
Route::get('/pruebamail', [ExtranetPageController::class, 'pruebamail'])->name('pruebamail');

//---------------------------------------------------------------------------------
Route::group(['middleware' => 'auth'], function () {
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'admin'], function () {

        Route::get('index', [IntranetPageCotroller::class, 'index'])->name('admin-index');
        Route::post('restablecer-password', [IntranetPageCotroller::class, 'restablecer_password'])->name('admin-restablecer_password');
        // Rutas Index
        // ------------------------------------------------------------------------------------
        Route::group(['middleware' => 'adminSistema'], function () {
            // Ruta Administrador del Sistema Menus
            // ------------------------------------------------------------------------------------
            Route::get('menu-index', [MenuController::class, 'index'])->name('admin-menu-index');
            Route::get('menu-crear', [MenuController::class, 'crear'])->name('admin-menu-crear');
            Route::get('menu/{id}/editar', [MenuController::class, 'editar'])->name('admin-menu-editar');
            Route::post('menu', [MenuController::class, 'guardar'])->name('admin-menu-guardar');
            Route::put('menu/{id}', [MenuController::class, 'actualizar'])->name('admin-menu-actualizar');
            Route::get('menu/{id}/eliminar', [MenuController::class, 'eliminar'])->name('admin-menu-eliminar');
            Route::get('menu-guardar-orden', [MenuController::class, 'guardarOrden'])->name('admin-menu-guardar-orden');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Roles
            Route::get('rol-index', [RolController::class, 'index'])->name('admin-rol-index');
            Route::get('rol-crear', [RolController::class, 'crear'])->name('admin-rol-crear');
            Route::get('rol/{id}/editar', [RolController::class, 'editar'])->name('admin-rol-editar');
            Route::post('rol', [RolController::class, 'guardar'])->name('admin-rol-guardar');
            Route::put('rol/{id}', [RolController::class, 'actualizar'])->name('admin-rol-actualizar');
            Route::delete('rol/{id}/eliminar', [RolController::class, 'eliminar'])->name('admin-rol-eliminar');
            Route::get('roles/export/', [RolController::class, 'exportarExcel'])->name('roles-exportarExcel');
            // ------------------------------------------------------------------------------------
            /*RUTAS Administrador del Sistema MENU_ROL*/
            Route::get('_menus_rol', [MenuRolController::class, 'index'])->name('admin-menu_rol');
            Route::post('_menus_rol', [MenuRolController::class, 'guardar'])->name('admin-guardar_menu_rol');
            // ------------------------------------------------------------------------------------
            /*RUTAS DE PERMISO*/
            Route::get('permiso-index', [PermisoController::class, 'index'])->name('admin-permiso-index');
            Route::get('permiso-crear/{pagVolver?}', [PermisoController::class, 'crear'])->name('admin-crear_permiso');
            Route::post('permiso', [PermisoController::class, 'guardar'])->name('admin-guardar_permiso');
            Route::get('permiso/{id}/editar', [PermisoController::class, 'editar'])->name('admin-editar_permiso');
            Route::put('permiso/{id}', [PermisoController::class, 'actualizar'])->name('admin-actualizar_permiso');
            Route::delete('permiso/{id}', [PermisoController::class, 'eliminar'])->name('admin-eliminar_permiso');
            // ------------------------------------------------------------------------------------
            /*RUTAS PERMISO_ROL*/
            Route::get('_permiso-rol', [PermisoRolController::class, 'index'])->name('admin-permiso_rol');
            Route::post('_permiso-rol', [PermisoRolController::class, 'guardar'])->name('admin-guardar_permiso_rol');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Usuarios
            Route::get('usuario-index', [UsuarioController::class, 'index'])->name('admin-usuario-index');
            Route::get('usuario-crear', [UsuarioController::class, 'crear'])->name('admin-usuario-crear');
            Route::post('usuario', [UsuarioController::class, 'guardar'])->name('admin-usuario-guardar');
            Route::get('usuario/{id}/editar', [UsuarioController::class, 'editar'])->name('admin-usuario-editar');
            Route::put('usuario/{id}', [UsuarioController::class, 'actualizar'])->name('admin-usuario-actualizar');
            Route::delete('usuario/{id}', [UsuarioController::class, 'eliminar'])->name('admin-usuario-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Empresas
            Route::get('empresa-index', [EmpresaController::class, 'index'])->name('admin-empresa-index');
            Route::get('empresa-crear', [EmpresaController::class, 'crear'])->name('admin-empresa-crear');
            Route::post('empresa', [EmpresaController::class, 'guardar'])->name('admin-empresa-guardar');
            Route::get('empresa/{id}/editar', [EmpresaController::class, 'editar'])->name('admin-empresa-editar');
            Route::put('empresa/{id}', [EmpresaController::class, 'actualizar'])->name('admin-empresa-actualizar');
            Route::delete('empresa/{id}', [EmpresaController::class, 'eliminar'])->name('admin-empresa-eliminar');
            // ------------------------------------------------------------------------------------
        });
        // ------------------------------------------------------------------------------------
        Route::group(['middleware' => 'administrador'], function () {
            // Rutas Administrador
        });
    });
    //==================================================================================================================
    Route::group(['prefix' => 'funcionario'], function () {
        Route::get('listado', [FuncionarioController::class, 'index'])->name('funcionario-index');
        Route::get('crear-usuario', [FuncionarioController::class, 'crear_usuario'])->name('funcionario-crear_usuario');
        Route::get('actualizar-datos', [FuncionarioController::class, 'editar'])->name('funcionario-editar');
        Route::get('cambiar-password', [FuncionarioController::class, 'cambiar_password'])->name('funcionario-cambiar-password');
    });
    //==================================================================================================================

    Route::group(['prefix' => 'usuario'], function () {
        Route::get('index', [ClienteController::class, 'index'])->name('usuario-index');
        Route::get('generar', [ClienteController::class, 'generar'])->name('usuario-generar');
        Route::post('generar', [ClienteController::class, 'direccion'])->name('usuario-generar_direccion');

        Route::get('generarPQR/{id}', [ClienteController::class, 'generarPQR'])->name('usuario-generarPQR');
        Route::get('cargar_submotivos', [ClienteController::class, 'cargar_submotivos'])->name('cargar_submotivos');
        Route::get('generarConsulta', [ClienteController::class, 'generarConsulta'])->name('usuario-generarConsulta');
        Route::post('generarConsulta', [ClienteController::class, 'generarConsulta_guardar'])->name('usuario-generarConsulta-guardar');
        Route::get('generarFelicitacion', [ClienteController::class, 'generarFelicitacion'])->name('usuario-generarFelicitacion');
        Route::post('generarFelicitacion', [ClienteController::class, 'generarFelicitacion_guardar'])->name('usuario-generarFelicitacion-guardar');
        Route::get('gererarDenuncia', [ClienteController::class, 'gererarDenuncia'])->name('usuario-gererarDenuncia');
        Route::post('gererarDenuncia', [ClienteController::class, 'gererarDenuncia_guardar'])->name('usuario-gererarDenuncia-guardar');
        Route::get('generarSolicitudDatos', [ClienteController::class, 'generarSolicitudDatos'])->name('usuario-generarSolicitudDatos');
        Route::get('generarSolicitudDocumentos', [ClienteController::class, 'generarSolicitudDocumentos'])->name('usuario-generarSolicitudDocumentos');
        Route::post('generarSolicitudDocumentos', [ClienteController::class, 'generarSolicitudDocumentos_guardar'])->name('usuario-generarSolicitudDocumentos-guardar');
        Route::get('generarSugerencia', [ClienteController::class, 'generarSugerencia'])->name('usuario-generarSugerencia');
        Route::post('generarSugerencia', [ClienteController::class, 'generarSugerencia_guardar'])->name('usuario-generarSugerencia-guardar');
        //----------------------------------------------------------------------------------------------------------------------------------------------
        //Crear PQR

        //----------------------------------------------------------------------------------------------------------------------------------------------
        //Actualizar datos
        Route::get('actualizar-datos', [ClienteController::class, 'actualizar_datos'])->name('usuario-actualizar_datos');

        //Cambiar password
        Route::get('cambiar-password', [ClienteController::class, 'cambiar_password'])->name('usuario_cambiar_password');

        //Crear usuario asistido
        Route::get('crear-usuario', [ClienteController::class, 'crear_usuario'])->name('usuario_crear_usuario');

        //Consultar politicas
        Route::get('consulta-politicas', [ClienteController::class, 'consulta_politicas'])->name('usuario_consulta_politicas');

        //Consultar ayuda
        Route::get('ayuda', [ClienteController::class, 'ayuda'])->name('usuario_ayuda');
    });
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
});
