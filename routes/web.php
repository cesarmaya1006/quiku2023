<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Http\Controllers\Intranet\Admin\RolController;
use App\Http\Controllers\Intranet\Admin\MenuController;
use App\Http\Controllers\Intranet\Email\EmailController;
use App\Http\Controllers\Extranet\ExtranetPageController;
use App\Http\Controllers\Intranet\Admin\MenuRolController;
use App\Http\Controllers\Intranet\Admin\PermisoController;
use App\Http\Controllers\Intranet\Admin\UsuarioController;
use App\Http\Controllers\Intranet\Empresas\AreaController;
use App\Http\Controllers\Intranet\Empresas\SedeController;
use App\Http\Controllers\Intranet\Empresas\CargoController;
use App\Http\Controllers\Intranet\Empresas\NivelController;
use App\Http\Controllers\Intranet\Admin\CategoriaController;
use App\Http\Controllers\Intranet\Admin\PermisoRolController;
use App\Http\Controllers\Intranet\Funcionarios\PQRController;
use App\Http\Controllers\Intranet\Usuarios\ClienteController;
use App\Http\Controllers\Intranet\Admin\IntranetPageCotroller;
use App\Http\Controllers\Intranet\Funcionarios\PQR_P_Controller;
use App\Http\Controllers\Intranet\Funcionarios\PQR_Q_Controller;
use App\Http\Controllers\Intranet\Funcionarios\PQR_R_Controller;
use App\Http\Controllers\Intranet\Empresas\FuncionarioFController;
use App\Http\Controllers\Intranet\Empresas\WikuController;
use App\Http\Controllers\Intranet\Funcionarios\DenunciaController;
use App\Http\Controllers\Intranet\Funcionarios\SugerenciaController;
use App\Http\Controllers\Intranet\Funcionarios\FuncionarioController;
use App\Http\Controllers\Intranet\Funcionarios\FelicitacionController;
use App\Http\Controllers\Intranet\Funcionarios\SolicitudDatosController;
use App\Http\Controllers\Intranet\Funcionarios\AreasInfluenciaController;
use App\Http\Controllers\Intranet\Funcionarios\ConceptoUOpinionController;
use App\Http\Controllers\Intranet\Funcionarios\SolicitudDocInfoController;
use App\Http\Controllers\Intranet\Funcionarios\AsignacionParticularController;

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
Route::get('/migrar-bd', function () {
    echo Artisan::call('migrate:refresh');
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
Route::get('/cargar_sedes', [ExtranetPageController::class, 'cargar_sedes'])->name('cargar_sedes');
Route::get('/registro_final_pn', [ExtranetPageController::class, 'registro_final_pn'])->name('registro_final_pn');
Route::get('/pruebamail', [ExtranetPageController::class, 'pruebamail'])->name('pruebamail');

//---------------------------------------------------------------------------------
Route::group(['middleware' => 'auth'], function () {
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'admin'], function () {

        Route::get('index', [IntranetPageCotroller::class, 'index'])->name('admin-index');
        Route::post('restablecer-password', [IntranetPageCotroller::class, 'restablecer_password'])->name('admin-restablecer_password');
        Route::get('index/gestionarAsignacion/{id}', [FuncionarioController::class, 'gestionar_asignacion'])->name('funcionario-gestionar-asignacion');
        Route::get('index/gestionarAsignacionPeticion/{id}', [FuncionarioController::class, 'gestionar_asignacion_peticion'])->name('funcionario-gestionar-asignacion-peticion');
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
            Route::get('categorias-index', [CategoriaController::class, 'index'])->name('admin-categoria-index');
            Route::get('categorias-crear', [CategoriaController::class, 'crear'])->name('admin-categoria-crear');
            Route::get('categorias-editar/{id}', [CategoriaController::class, 'editar'])->name('admin-categoria-editar');
            Route::post('categorias-guardar', [CategoriaController::class, 'guardar'])->name('admin-categoria-guardar');
            Route::put('categorias-actualizar/{id}', [CategoriaController::class, 'actualizar'])->name('admin-categoria-actualizar');
        });
        Route::group(['prefix' => 'funcionario'], function () {
            // Rutas parametrizacion
            // ------------------------------------------------------------------------------------
            // Rutas areas
            Route::get('areas-index', [AreaController::class, 'index'])->name('admin-funcionario-area-index');
            Route::get('areas-crear', [AreaController::class, 'crear'])->name('admin-funcionario-areas-crear');
            Route::get('areas-editar/{id}', [AreaController::class, 'editar'])->name('admin-funcionario-areas-editar');
            Route::post('areas-guardar', [AreaController::class, 'guardar'])->name('admin-funcionario-areas-guardar');
            Route::put('areas-actualizar/{id}', [AreaController::class, 'actualizar'])->name('admin-funcionario-areas-actualizar');
            // ------------------------------------------------------------------------------------
            // Rutas niveles
            Route::get('niveles-index', [NivelController::class, 'index'])->name('admin-funcionario-nivel-index');
            Route::get('niveles-crear', [NivelController::class, 'crear'])->name('admin-funcionario-niveles-crear');
            Route::get('niveles-editar/{id}', [NivelController::class, 'editar'])->name('admin-funcionario-niveles-editar');
            Route::post('niveles-guardar', [NivelController::class, 'guardar'])->name('admin-funcionario-niveles-guardar');
            Route::put('niveles-actualizar/{id}', [NivelController::class, 'actualizar'])->name('admin-funcionario-niveles-actualizar');
            // ------------------------------------------------------------------------------------
            // Rutas cargos
            Route::get('cargos-index', [CargoController::class, 'index'])->name('admin-funcionario-cargo-index');
            Route::get('cargos-crear', [CargoController::class, 'crear'])->name('admin-funcionario-cargos-crear');
            Route::get('cargos-editar/{id}', [CargoController::class, 'editar'])->name('admin-funcionario-cargos-editar');
            Route::post('cargos-guardar', [CargoController::class, 'guardar'])->name('admin-funcionario-cargos-guardar');
            Route::put('cargos-actualizar/{id}', [CargoController::class, 'actualizar'])->name('admin-funcionario-cargos-actualizar');
            Route::get('cargar_niveles', [CargoController::class, 'cargar_niveles'])->name('cargar_niveles');
            // ------------------------------------------------------------------------------------// ------------------------------------------------------------------------------------
            // Rutas Sedes
            Route::get('sedes-index', [SedeController::class, 'index'])->name('admin-funcionario-sedes-index');
            Route::get('sedes-crear', [SedeController::class, 'crear'])->name('admin-funcionario-sedes-crear');
            Route::get('sedes-editar/{id}', [SedeController::class, 'editar'])->name('admin-funcionario-sedes-editar');
            Route::post('sedes-guardar', [SedeController::class, 'guardar'])->name('admin-funcionario-sedes-guardar');
            Route::put('sedes-actualizar/{id}', [SedeController::class, 'actualizar'])->name('admin-funcionario-sedes-actualizar');
            Route::delete('sedes/{id}', [SedeController::class, 'eliminar'])->name('admin-funcionario-sedes-eliminar');
            // ------------------------------------------------------------------------------------// ------------------------------------------------------------------------------------
            // Rutas Areas de influencia
            Route::get('areas_influencia-index', [AreasInfluenciaController::class, 'index'])->name('admin-funcionario-areas_influencia-index');
            Route::post('areas_influencia', [AreasInfluenciaController::class, 'guardar'])->name('admin-funcionario-areas_influencia-guardar');
            // ------------------------------------------------------------------------------------
            // Rutas Asignacion particular
            Route::get('asignacion_particular-index', [AsignacionParticularController::class, 'index'])->name('admin-funcionario-asignacion_particular-index');
            Route::get('asignacion_particular-crear', [AsignacionParticularController::class, 'crear'])->name('admin-funcionario-asignacion_particular-crear');
            Route::post('asignacion_particular', [AsignacionParticularController::class, 'guardar'])->name('admin-funcionario-asignacion_particular-guardar');
            // .-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-
            Route::get('asignacion_particular-cargar_motivo', [AsignacionParticularController::class, 'cargar_motivo'])->name('admin-funcionario-asignacion_particular-cargar_motivo');
            Route::get('asignacion_particular-cargar_sub_motivo', [AsignacionParticularController::class, 'cargar_sub_motivo'])->name('admin-funcionario-asignacion_particular-cargar_sub_motivo');
            Route::get('asignacion_particular-cargar_producto', [AsignacionParticularController::class, 'cargar_producto'])->name('admin-funcionario-asignacion_particular-cargar_producto');
            Route::get('asignacion_particular-cargar_marca', [AsignacionParticularController::class, 'cargar_marca'])->name('admin-funcionario-asignacion_particular-cargar_marca');
            Route::get('asignacion_particular-cargar_referencia', [AsignacionParticularController::class, 'cargar_referencia'])->name('admin-funcionario-asignacion_particular-cargar_referencia');
            Route::get('asignacion_particular-cargar_municipio', [AsignacionParticularController::class, 'cargar_municipio'])->name('admin-funcionario-asignacion_particular-cargar_municipio');
            Route::get('asignacion_particular-cargar_sede', [AsignacionParticularController::class, 'cargar_sede'])->name('admin-funcionario-asignacion_particular-cargar_sede');
            Route::get('asignacion_particular-cargar_cargo', [AsignacionParticularController::class, 'cargar_cargo'])->name('admin-funcionario-asignacion_particular-cargar_cargo');
            // ------------------------------------------------------------------------------------
            //Gestión de funcionarios
            Route::get('funcionarios/index', [FuncionarioFController::class, 'index'])->name('funcionarios_funcionarios-index');
            Route::get('funcionarios/crear', [FuncionarioFController::class, 'crear'])->name('funcionarios_funcionarios-crear');
            Route::get('funcionarios/editar/{id}', [FuncionarioFController::class, 'editar'])->name('funcionarios_funcionarios-editar');
            Route::post('funcionarios-guardar', [FuncionarioFController::class, 'guardar'])->name('funcionarios_funcionarios-guardar');
            Route::put('funcionarios-actualizar/{id}', [FuncionarioFController::class, 'actualizar'])->name('funcionarios_funcionarios-actualizar');
            Route::get('funcionarios/{id}', [FuncionarioFController::class, 'activar'])->name('funcionarios_funcionarios-activar');
            Route::get('funcionarios-cargar_niveles', [FuncionarioFController::class, 'cargar_niveles'])->name('funcionarios_funcionarios-cargar_niveles');
            Route::get('funcionarios-cargar_cargos', [FuncionarioFController::class, 'cargar_cargos'])->name('funcionarios_funcionarios-cargar_cargos');
            // ------------------------------------------------------------------------------------
            //Gestión de wiku
            Route::get('wiku/index', [WikuController::class, 'index'])->name('wiku-index');
            //. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
            Route::get('wiku_norma/crear', [WikuController::class, 'crear_norma'])->name('wiku_norma-crear');
            Route::post('wiku_norma-guardar', [WikuController::class, 'guardar_norma'])->name('wiku_norma-guardar');
            //. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
            Route::get('wiku/index_fuenteN', [WikuController::class, 'index_fuenteN'])->name('wiku-index_fuenteN');
            Route::get('wiku_fuente/crear', [WikuController::class, 'crear_fuente'])->name('wiku_fuenteN-crear');
            Route::post('wiku_fuente-guardar', [WikuController::class, 'guardar_fuenteN'])->name('wiku_fuenteN-guardar');
        });
    });
    //==================================================================================================================
    Route::group(['prefix' => 'funcionario'], function () {
        Route::get('listado', [FuncionarioController::class, 'index'])->name('funcionario-index');
        Route::get('crear-usuario', [FuncionarioController::class, 'crear_usuario'])->name('funcionario-crear_usuario');
        Route::get('crear-usuario-creado/{id}', [FuncionarioController::class, 'usuario_creado'])->name('funcionario-usuario_creado');
        Route::post('crear-usuario', [FuncionarioController::class, 'registro_asistido'])->name('funcionario-registro_asistido');
        Route::get('actualizar-datos', [FuncionarioController::class, 'editar'])->name('funcionario-editar');
        Route::post('actualizar-datos', [FuncionarioController::class, 'actualizar'])->name('funcionario-actualizar');
        Route::get('cambiar-password', [FuncionarioController::class, 'cambiar_password'])->name('funcionario-cambiar-password');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('listado/gestionar_pqr_p/{id}', [PQR_P_Controller::class, 'gestionar'])->name('funcionario-gestionar_pqr_p');
        Route::post('listado/gestionar_pqr_p', [PQR_P_Controller::class, 'gestionar_guardar'])->name('funcionario-gestionar_pqr_p_guardar');
        // Route::post('prorroga', [PQR_P_Controller::class, 'prorroga_guardar'])->name('prorroga_guardar');
        Route::post('respuesta_recurso', [PQR_P_Controller::class, 'respuesta_recurso_guardar'])->name('respuesta_recurso_guardar');
        Route::post('respuesta_recurso_anexos', [PQR_P_Controller::class, 'respuesta_recurso_anexos_guardar'])->name('respuesta_recurso_anexos_guardar');

        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('listado/gestionar_pqr_q/{id}', [PQR_Q_Controller::class, 'gestionar'])->name('funcionario-gestionar_pqr_q');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('listado/gestionar_pqr_r/{id}', [PQR_R_Controller::class, 'gestionar'])->name('funcionario-gestionar_pqr_r');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('listado/gestionarConceptoUOpinion/{id}', [ConceptoUOpinionController::class, 'gestionar'])->name('funcionario-gestionarConceptoUOpinion');
        Route::post('listado/gestionar_conceptoUOpinion', [ConceptoUOpinionController::class, 'gestionar_guardar'])->name('funcionario-gestionar_conceptoUOpinion_guardar');
        Route::post('prorroga_cuo', [ConceptoUOpinionController::class, 'prorroga_guardar'])->name('prorroga_guardar_cuo');
        Route::post('respuesta_recurso_cuo', [ConceptoUOpinionController::class, 'respuesta_recurso_guardar'])->name('respuesta_recurso_guardar_cuo');
        Route::post('respuesta_recurso_anexos_cuo', [ConceptoUOpinionController::class, 'respuesta_recurso_anexos_guardar'])->name('respuesta_recurso_anexos_guardar_cuo');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('listado/gestionarFelicitacion/{id}', [FelicitacionController::class, 'gestionar'])->name('funcionario-gestionarFelicitacion');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('listado/gestionarDenuncia/{id}', [DenunciaController::class, 'gestionar'])->name('funcionario-gestionarDenuncia');
        Route::post('listado/gestionar_denuncia', [DenunciaController::class, 'gestionar_guardar'])->name('funcionario-gestionar_denuncia_guardar');
        Route::post('prorroga_d', [DenunciaController::class, 'prorroga_guardar'])->name('prorroga_guardar_d');
        Route::post('respuesta_recurso_d', [DenunciaController::class, 'respuesta_recurso_guardar'])->name('respuesta_recurso_guardar_d');
        Route::post('respuesta_recurso_anexos_d', [DenunciaController::class, 'respuesta_recurso_anexos_guardar'])->name('respuesta_recurso_anexos_guardar_d');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Route::get('listado/gestionarSolicitudDatos/{id}', [SolicitudDatosController::class, 'gestionar'])->name('funcionario-gestionarSolicitudDatos');
        Route::post('listado/gestionar_solicitudDatos', [SolicitudDatosController::class, 'gestionar_guardar'])->name('funcionario-gestionar_solicitudDatos_guardar');
        Route::post('prorroga_sd', [SolicitudDatosController::class, 'prorroga_guardar'])->name('prorroga_guardar_sd');
        Route::post('respuesta_recurso_sd', [SolicitudDatosController::class, 'respuesta_recurso_guardar'])->name('respuesta_recurso_guardar_sd');
        Route::post('respuesta_recurso_anexos_sd', [SolicitudDatosController::class, 'respuesta_recurso_anexos_guardar'])->name('respuesta_recurso_anexos_guardar_sd');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Route::get('listado/gestionarSolicitudDocumentos/{id}', [SolicitudDocInfoController::class, 'gestionar'])->name('funcionario-gestionarSolicitudDocumentos');
        Route::post('listado/gestionar_solicitudDocInfo', [SolicitudDocInfoController::class, 'gestionar_guardar'])->name('funcionario-gestionar_solicitudDocInfo_guardar');
        Route::post('prorroga_sdi', [SolicitudDocInfoController::class, 'prorroga_guardar'])->name('prorroga_guardar_sdi');
        Route::post('respuesta_recurso_sdi', [SolicitudDocInfoController::class, 'respuesta_recurso_guardar'])->name('respuesta_recurso_guardar_sdi');
        Route::post('respuesta_recurso_anexos_sdi', [SolicitudDocInfoController::class, 'respuesta_recurso_anexos_guardar'])->name('respuesta_recurso_anexos_guardar_sdi');

        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Route::get('listado/gestionarSugerencia/{id}', [SugerenciaController::class, 'gestionar'])->name('funcionario-gestionarSugerencia');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Route::post('asignacion', [PQRController::class, 'asignacion_guardar'])->name('asignacion_guardar');
        Route::post('historial', [PQRController::class, 'historial_guardar'])->name('historial_guardar');
        Route::post('historial_tarea', [PQRController::class, 'historial_tarea_guardar'])->name('historial_tarea_guardar');
        Route::post('historial_peticion', [PQRController::class, 'historial_peticion_guardar'])->name('historial_peticion_guardar');
        Route::post('asignacion_tarea', [PQRController::class, 'asignacion_tarea_guardar'])->name('asignacion_tarea_guardar');
        Route::post('asignacion_peticion', [PQRController::class, 'asignacion_peticion_guardar'])->name('asignacion_peticion_guardar');
        Route::post('prioridad', [PQRController::class, 'prioridad_guardar'])->name('prioridad_guardar');
        Route::post('prorroga', [PQRController::class, 'prorroga_guardar'])->name('prorroga_guardar');
        Route::post('plazo_recurso', [PQRController::class, 'plazo_recurso_guardar'])->name('plazo_recurso_guardar');
        Route::get('cargar_tareas', [PQRController::class, 'cargar_tareas'])->name('cargar_tareas');
        Route::get('cargar_cargos', [PQRController::class, 'cargar_cargos'])->name('cargar_cargos');
        Route::get('cargar_funcionarios', [PQRController::class, 'cargar_funcionarios'])->name('cargar_funcionarios');
    });
    //==================================================================================================================

    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'usuario'], function () {
        Route::get('listado', [ClienteController::class, 'index'])->name('usuario-index');
        Route::get('generar', [ClienteController::class, 'generar'])->name('usuario-generar');
        Route::post('generar', [ClienteController::class, 'direccion'])->name('usuario-generar_direccion');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('generarPQR/{id}', [ClienteController::class, 'generarPQR'])->name('usuario-generarPQR');
        Route::post('generarPQR', [ClienteController::class, 'generarPQR_guardar'])->name('usuario-generarPQR-guardar');
        Route::get('generarPQR-motivos/{id}', [ClienteController::class, 'generarPQR_motivos'])->name('usuario-generarPQR_motivos');
        Route::post('generarPQR-motivos', [ClienteController::class, 'generarPQR_motivos_guardar'])->name('usuario-generarPQR_motivos-guardar');
        Route::get('cargar_submotivos', [ClienteController::class, 'cargar_submotivos'])->name('cargar_submotivos');
        Route::get('cargar_productos', [ClienteController::class, 'cargar_productos'])->name('cargar_productos');
        Route::get('cargar_marcas', [ClienteController::class, 'cargar_marcas'])->name('cargar_marcas');
        Route::get('cargar_referencias', [ClienteController::class, 'cargar_referencias'])->name('cargar_referencias');
        //----------------------------------------------------------------------------------------------------------------
        Route::get('listado/gestionarPQR/{id}', [ClienteController::class, 'gestionar_PQR'])->name('usuario-gestionarPQR');
        Route::post('listado/gestionarPQR', [PQR_P_Controller::class, 'gestionar_guardar_usuario'])->name('usuario-gestionar_pqr_p_guardar');
        Route::post('recurso', [PQR_P_Controller::class, 'recurso_guardar'])->name('recurso_guardar');
        Route::post('recurso_anexos', [PQR_P_Controller::class, 'recurso_anexos_guardar'])->name('recurso_anexos_guardar');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('generarConceptoUOpinion', [ClienteController::class, 'generarConceptoUOpinion'])->name('usuario-generarConceptoUOpinion');
        Route::post('generarConceptoUOpinion', [ClienteController::class, 'generarConceptoUOpinion_guardar'])->name('usuario-generarConceptoUOpinion-guardar');
        Route::get('listado/gestionarConceptoUOpinion/{id}', [ClienteController::class, 'gestionar_conceptoUOpinion'])->name('usuario-gestionarConceptoUOpinion');
        Route::post('listado/gestionarConceptoUOpinion', [ConceptoUOpinionController::class, 'gestionar_guardar_usuario'])->name('usuario-gestionar_conceptoUOpinion_guardar');
        Route::post('recurso_cuo', [ConceptoUOpinionController::class, 'recurso_guardar'])->name('recurso_guardar_cuo');
        Route::post('recurso_anexos_cuo', [ConceptoUOpinionController::class, 'recurso_anexos_guardar'])->name('recurso_anexos_guardar_cuo');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Route::get('generarFelicitacion', [ClienteController::class, 'generarFelicitacion'])->name('usuario-generarFelicitacion');
        Route::post('generarFelicitacion', [ClienteController::class, 'generarFelicitacion_guardar'])->name('usuario-generarFelicitacion-guardar');
        Route::get('listado/gestionarFelicitaciones/{id}', [ClienteController::class, 'gestionar_felicitaciones'])->name('usuario-gestionarFelicitacion');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('gererarDenuncia', [ClienteController::class, 'gererarDenuncia'])->name('usuario-gererarDenuncia');
        Route::post('gererarDenuncia', [ClienteController::class, 'gererarDenuncia_guardar'])->name('usuario-gererarDenuncia-guardar');
        Route::get('listado/gestionarReporte/{id}', [ClienteController::class, 'gestionar_reporteDeIrregularidad'])->name('usuario-gestionarReporte');
        Route::post('listado/gestionarReporte', [DenunciaController::class, 'gestionar_guardar_usuario'])->name('usuario-gestionar_reporte_guardar');
        Route::post('recurso_d', [DenunciaController::class, 'recurso_guardar'])->name('recurso_guardar_d');
        Route::post('recurso_anexos_d', [DenunciaController::class, 'recurso_anexos_guardar'])->name('recurso_anexos_guardar_d');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('generarSolicitudDatos', [ClienteController::class, 'generarSolicitudDatos'])->name('usuario-generarSolicitudDatos');
        Route::post('generarSolicitudDatos', [ClienteController::class, 'generarSolicitudDatos_guardar'])->name('usuario-generarSolicitudDatos-guardar');
        Route::get('listado/gestionarSolicitudDatos/{id}', [ClienteController::class, 'gestionar_solicitudDatos'])->name('usuario-gestionarSolicitudDatos');
        Route::post('listado/gestionarSolicitudDatos', [SolicitudDatosController::class, 'gestionar_guardar_usuario'])->name('usuario-gestionar_solicitudDatos_guardar');
        Route::post('recurso_sd', [SolicitudDatosController::class, 'recurso_guardar'])->name('recurso_guardar_sd');
        Route::post('recurso_anexos_sd', [SolicitudDatosController::class, 'recurso_anexos_guardar'])->name('recurso_anexos_guardar_sd');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        Route::get('generarSolicitudDocumentos', [ClienteController::class, 'generarSolicitudDocumentos'])->name('usuario-generarSolicitudDocumentos');
        Route::post('generarSolicitudDocumentos', [ClienteController::class, 'generarSolicitudDocumentos_guardar'])->name('usuario-generarSolicitudDocumentos-guardar');
        Route::get('listado/gestionarSolicitudDocInfo/{id}', [ClienteController::class, 'gestionar_solicitudDocInfo'])->name('usuario-gestionarSolicitudDocInfo');
        Route::post('listado/gestionarSolicitudDocInfo', [SolicitudDocInfoController::class, 'gestionar_guardar_usuario'])->name('usuario-gestionar_solicitudDocInfo_guardar');
        Route::post('recurso_sdi', [SolicitudDocInfoController::class, 'recurso_guardar'])->name('recurso_guardar_sdi');
        Route::post('recurso_anexos_sdi', [SolicitudDocInfoController::class, 'recurso_anexos_guardar'])->name('recurso_anexos_guardar_sdi');
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Route::get('generarSugerencia', [ClienteController::class, 'generarSugerencia'])->name('usuario-generarSugerencia');
        Route::post('generarSugerencia', [ClienteController::class, 'generarSugerencia_guardar'])->name('usuario-generarSugerencia-guardar');
        Route::get('listado/gestionarSugerencia/{id}', [ClienteController::class, 'gestionar_sugerencia'])->name('usuario-gestionarsugerencia');

        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        //Actualizar datos
        Route::get('actualizar-datos', [ClienteController::class, 'actualizar_datos'])->name('usuario-actualizar_datos');
        Route::post('actualizar-datos', [ClienteController::class, 'actualizar'])->name('usuario-actualizar');

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
    //Consultar ayuda
    Route::get('download/{id_tipo_pqr}/{id_pqr}', [ClienteController::class, 'download'])->name('download');
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //Descarga de pdf
    Route::get('pqr_radicada_download/{id}', [EmailController::class, 'Pqr_Radicada_pdf'])->name('pqr_radicada_download');
    Route::get('Pqr_Radicada_pdf_email/{id}', [EmailController::class, 'Pqr_Radicada_pdf_email'])->name('Pqr_Radicada_pdf_email');
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //guardar pdf PQR
    Route::get('pqr_pdf_guardar', [EmailController::class, 'pqr_pdf_guardar'])->name('pqr_pdf_guardar');
});
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

Route::get('pqr_radicada_pdf/{id}', [EmailController::class, 'pqrRadicadaPdf'])->name('pqrRadicadaPdf');
Route::get('pqr_radicada_pdf_sd/{id}', [EmailController::class, 'pqrRadicadaPdfSd'])->name('pqrRadicadaPdfSd');
Route::get('pqr_radicada_pdf_sfi/{id}', [EmailController::class, 'pqrRadicadaPdfSdi'])->name('pqrRadicadaPdfSdi');
Route::get('pqr_radicada_pdf_cuo/{id}', [EmailController::class, 'pqrRadicadaPdfCuo'])->name('pqrRadicadaPdfCuo');
Route::get('pqr_radicada_pdf_ri/{id}', [EmailController::class, 'pqrRadicadaPdfRi'])->name('pqrRadicadaPdfRi');
Route::get('felicitacion_radicada_pdf/{id}', [EmailController::class, 'felicitacionRadicadaPdf'])->name('felicitacionRadicadaPdf');
Route::get('sugerencia_radicada_pdf/{id}', [EmailController::class, 'sugerenciaRadicadaPdf'])->name('sugerenciaRadicadaPdf');
Route::get('aclaracion_pdf/{id}', [EmailController::class, 'aclaracionPdf'])->name('aclaracionPdf');
Route::get('aclaracion_pdf_sd/{id}', [EmailController::class, 'aclaracionPdfSd'])->name('aclaracionPdfSd');
Route::get('aclaracion_pdf_sdi/{id}', [EmailController::class, 'aclaracionPdfSdi'])->name('aclaracionPdfSdi');
Route::get('aclaracion_pdf_cuo/{id}', [EmailController::class, 'aclaracionPdfCuo'])->name('aclaracionPdfCuo');
Route::get('aclaracion_pdf_ri/{id}', [EmailController::class, 'aclaracionPdfRi'])->name('aclaracionPdfRi');
Route::get('constancia_aclaracion_pdf/{id}', [EmailController::class, 'constancia_aclaracionPdf'])->name('constancia_aclaracionPdf');
Route::get('constancia_aclaracion_pdf_sd/{id}', [EmailController::class, 'constancia_aclaracionPdfSd'])->name('constancia_aclaracionPdfSd');
Route::get('constancia_aclaracion_pdf_sdi/{id}', [EmailController::class, 'constancia_aclaracionPdfSdi'])->name('constancia_aclaracionPdfSdi');
Route::get('constancia_aclaracion_pdf_cuo/{id}', [EmailController::class, 'constancia_aclaracionPdfCuo'])->name('constancia_aclaracionPdfCuo');
Route::get('constancia_aclaracion_pdf_ri/{id}', [EmailController::class, 'constancia_aclaracionPdfRi'])->name('constancia_aclaracionPdfRi');
Route::get('prorroga_pdf/{id}', [EmailController::class, 'prorrogaPdf'])->name('prorrogaPdf');
Route::get('prorroga_pdf_sd/{id}', [EmailController::class, 'prorrogaPdfSd'])->name('prorrogaPdfSd');
Route::get('prorroga_pdf_sdi/{id}', [EmailController::class, 'prorrogaPdfSdi'])->name('prorrogaPdfSdi');
Route::get('prorroga_pdf_cuo/{id}', [EmailController::class, 'prorrogaPdfCuo'])->name('prorrogaPdfCuo');
Route::get('prorroga_pdf_ri/{id}', [EmailController::class, 'prorrogaPdfRi'])->name('prorrogaPdfRi');
Route::get('recurso_pdf/{id}', [EmailController::class, 'recursoPdf'])->name('recursoPdf');
Route::get('asigacion_automatica/{id}', [PQR_P_Controller::class, 'asigacion_automatica'])->name('asigacion_automatica');
Route::get('recurso_pdf_sd/{id}', [EmailController::class, 'recursoPdfSd'])->name('recursoPdfSd');
Route::get('recurso_pdf_sdi/{id}', [EmailController::class, 'recursoPdfSdi'])->name('recursoPdfSdi');
Route::get('recurso_pdf_cuo/{id}', [EmailController::class, 'recursoPdfCuo'])->name('recursoPdfCuo');
Route::get('recurso_pdf_ri/{id}', [EmailController::class, 'recursoPdfRi'])->name('recursoPdfRi');
