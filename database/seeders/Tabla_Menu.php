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
            ['nombre' => 'Inicio', 'menu_id' => '0', 'url' => 'admin/index', 'orden' => '1', 'icono' => 'fas fa-home'],
            ['nombre' => 'Sistema', 'menu_id' => '0', 'url' => '#', 'orden' => '2', 'icono' => 'fas fa-tools'],
            //----------------------------------------------------------------------------------------------------------------------
            // Menus hijos
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Menús', 'menu_id' => '2',  'url' => 'admin/menu-index', 'orden' => '1',  'icono' => 'fas fa-list-ul'],
            ['nombre' => 'Roles Usuarios', 'menu_id' => '2', 'url' => 'admin/rol-index', 'orden' => '2', 'icono' => 'fas fa-user-tag'],
            ['nombre' => 'Menú - Roles', 'menu_id' => '2', 'url' => 'admin/_menus_rol', 'orden' => '3', 'icono' => 'fas fa-chalkboard-teacher'],
            ['nombre' => 'Permisos', 'menu_id' => '2', 'url' => 'admin/permiso-index', 'orden' => '4', 'icono' => 'fas fa-lock'],
            ['nombre' => 'Permisos -Rol', 'menu_id' => '2', 'url' => 'admin/_permiso-rol', 'orden' => '5', 'icono' => 'fas fa-user-lock'],
            ['nombre' => 'Usuarios', 'menu_id' => '2', 'url' => '#', 'orden' => '5', 'icono' => 'fas fa-user-friends'],
            // Menus padre
            ['nombre' => 'Gestionar', 'menu_id' => '0', 'url' => '#', 'orden' => '3', 'icono' => 'fas fa-chalkboard-teacher'],
            //----------------------------------------------------------------------------------------------------------------------
            // Menus hijos
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Listado PQR', 'menu_id' => '9',  'url' => 'usuario/index', 'orden' => '1',  'icono' => 'far fa-list-alt'],
            ['nombre' => 'Generar PQR', 'menu_id' => '9',  'url' => 'usuario/generar', 'orden' => '2',  'icono' => 'fas fa-plus-square'],
            //----------------------------------------------------------------------------------------------------------------------
            // Menus  padre
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Actualizar datos', 'menu_id' => '0', 'url' => 'usuario/actualizar-datos', 'orden' => '4', 'icono' => 'fas fa-edit'],
            // Menus  padre
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Cambiar contraseña', 'menu_id' => '0', 'url' => 'usuario/cambiar-password', 'orden' => '5', 'icono' => 'fas fa-key'],
            // Menus  padre
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Crear usuario asistido', 'menu_id' => '0', 'url' => 'usuario/crear-usuario', 'orden' => '6', 'icono' => 'fas fa-user-plus'],
            // Menus  padre
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Consulte nuestas políticas de datos y ayuda', 'menu_id' => '0', 'url' => 'usuario/consulta-politicas', 'orden' => '7', 'icono' => 'fas fa-question-circle'],

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
