<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            // Menus padre
            ['nombre' =>  'Inicio', 'menu_id' => '0', 'url' =>  'admin/index', 'orden' => '1', 'icono' =>  'fas fa-home'],
            ['nombre' =>  'Sistema', 'menu_id' => '0', 'url' =>  '#', 'orden' => '6', 'icono' =>  'fas fa-tools'],
            ['nombre' =>  'Menús', 'menu_id' => '2', 'url' =>  'admin/menu-index', 'orden' => '1', 'icono' =>  'fas fa-list-ul'],
            ['nombre' =>  'Roles Usuarios', 'menu_id' => '2', 'url' =>  'admin/rol-index', 'orden' => '2', 'icono' =>  'fas fa-user-tag'],
            ['nombre' =>  'Menú - Roles', 'menu_id' => '2', 'url' =>  'admin/_menus_rol', 'orden' => '3', 'icono' =>  'fas fa-chalkboard-teacher'],
            ['nombre' =>  'Permisos', 'menu_id' => '2', 'url' =>  'admin/permiso-index', 'orden' => '4', 'icono' =>  'fas fa-lock'],
            ['nombre' =>  'Permisos -Rol', 'menu_id' => '2', 'url' =>  'admin/_permiso-rol', 'orden' => '5', 'icono' =>  'fas fa-user-lock'],
            ['nombre' =>  'Usuarios', 'menu_id' => '2', 'url' =>  '#', 'orden' => '6', 'icono' =>  'fas fa-user-friends'],
            ['nombre' =>  'Gestionar', 'menu_id' => '0', 'url' =>  '#', 'orden' => '7', 'icono' =>  'fas fa-chalkboard-teacher'],
            ['nombre' =>  'Listado PQR', 'menu_id' => '9', 'url' =>  'usuario/listado', 'orden' => '1', 'icono' =>  'far fa-list-alt'],
            ['nombre' =>  'Generar PQR', 'menu_id' => '9', 'url' =>  'usuario/generar', 'orden' => '3', 'icono' =>  'fas fa-plus-square'],
            ['nombre' =>  'Otras opciones', 'menu_id' => '0', 'url' =>  '#', 'orden' => '8', 'icono' =>  'fas fa-question-circle'],
            ['nombre' =>  'Consulte nuestas políticas de datos', 'menu_id' => '12', 'url' =>  'usuario/consulta-politicas', 'orden' => '1', 'icono' =>  'fas fa-question-circle'],
            ['nombre' =>  'Ayuda', 'menu_id' => '12', 'url' =>  'usuario/ayuda', 'orden' => '2', 'icono' =>  'fas fa-question-circle'],
            ['nombre' =>  'Actualizar datos', 'menu_id' => '12', 'url' =>  'usuario/actualizar-datos', 'orden' => '3', 'icono' =>  'fas fa-edit'],
            ['nombre' =>  'Cambiar contraseña', 'menu_id' => '12', 'url' =>  'usuario/cambiar-password', 'orden' => '4', 'icono' =>  'fas fa-key'],
            ['nombre' =>  'Listado PQR', 'menu_id' => '33', 'url' =>  'funcionario/listado', 'orden' => '1', 'icono' =>  'fas fa-question-circle'],
            ['nombre' =>  'Crear usuario asistido', 'menu_id' => '34', 'url' =>  'funcionario/crear-usuario', 'orden' => '1', 'icono' =>  'fas fa-user-plus'],
            ['nombre' =>  'Actualizar datos', 'menu_id' => '34', 'url' =>  'funcionario/actualizar-datos', 'orden' => '2', 'icono' =>  'fas fa-edit'],
            ['nombre' =>  'Cambiar contraseña', 'menu_id' => '34', 'url' =>  'funcionario/cambiar-password', 'orden' => '3', 'icono' =>  'fas fa-key'],
            ['nombre' =>  'Listado usuarios', 'menu_id' => '33', 'url' =>  'funcionario/usuarios-listado', 'orden' => '2', 'icono' =>  'fas fa-list-ul'],
            ['nombre' =>  'Parametros', 'menu_id' => '0', 'url' =>  '#', 'orden' => '9', 'icono' =>  'fas fa-cogs'],
            ['nombre' =>  'Categorias', 'menu_id' => '22', 'url' =>  'admin/categorias-index', 'orden' => '1', 'icono' =>  'fas fa-list-ul'],
            ['nombre' =>  'Productos', 'menu_id' => '22', 'url' =>  'admin/productos-index', 'orden' => '2', 'icono' =>  'fas fa-list-ul'],
            ['nombre' =>  'Marcas', 'menu_id' => '22', 'url' =>  'admin/marcas-index', 'orden' => '3', 'icono' =>  'fas fa-list-ul'],
            ['nombre' =>  'Referencias', 'menu_id' => '22', 'url' =>  'admin/referencias-index', 'orden' => '4', 'icono' =>  'fas fa-list-ul'],
            ['nombre' =>  'Wiku', 'menu_id' => '0', 'url' =>  'funcionario/wiku-index', 'orden' => '4', 'icono' =>  'fas fa-list-ul'],
            ['nombre' =>  'Tutelas', 'menu_id' => '0', 'url' =>  '#', 'orden' => '3', 'icono' =>  'fas fa-chalkboard-teacher'],
            ['nombre' =>  'Registro', 'menu_id' => '28', 'url' =>  'admin/registro', 'orden' => '1', 'icono' =>  'fas fa-plus-square'],
            ['nombre' =>  'Listado', 'menu_id' => '28', 'url' =>  'admin/listado', 'orden' => '2', 'icono' =>  'far fa-list-alt'],
            ['nombre' =>  'Gestión', 'menu_id' => '28', 'url' =>  'admin/gestion', 'orden' => '3', 'icono' =>  'fas fa-grip-horizontal'],
            ['nombre' =>  'Consulta', 'menu_id' => '28', 'url' =>  'funcionario/consulta', 'orden' => '4', 'icono' =>  'fas fa-search'],
            ['nombre' =>  'PQR', 'menu_id' => '0', 'url' =>  '#', 'orden' => '2', 'icono' =>  'Elija un Icono'],
            ['nombre' =>  'Conf Cuenta Usuario', 'menu_id' => '0', 'url' =>  '#', 'orden' => '5', 'icono' =>  'fas fa-user-cog'],
            ['nombre' =>  'Gestionar PQR', 'menu_id' => '33', 'url' =>  'funcionario/gestion_pqr', 'orden' => '2', 'icono' =>  'fas fa-grip-horizontal'],
            //----------------------------------------------------------------------------------------------------------------------

        ];

        foreach ($menus as $menu) {
            DB::table('menu')->insert([
                'nombre' => utf8_encode(utf8_decode($menu['nombre'])),
                'menu_id' => $menu['menu_id'],
                'url' => $menu['url'],
                'orden' => $menu['orden'],
                'icono' => $menu['icono'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
