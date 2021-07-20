<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            'docutipos', 'roles', 'menu', 'menu_rol', 'icono', 'pais', 'departamento', 'municipio',
            'sedes', 'parametros', 'areas', 'niveles', 'cargos', 'tipo_reposicion', 'area_influencia',
            'usuarios', 'personas', 'tipo_pqr', 'prioridades', 'estadospqr', 'motivos', 'motivo_sub', 'categorias', 'productos', 'marcas',
            'referencias', 'servicios', 'diasfestivos',

        ]);
        // --------------------------------------------------------------------------------------------------
        $this->call(Tabla_DocuTipos::class);
        $this->call(Tabla_Roles::class);
        $this->call(Tabla_Menu::class);
        $this->call(Tabla_MenuRol::class);
        $this->call(Tabla_Icono::class);
        $this->call(Tabla_Pais::class);
        $this->call(Tabla_Departamento::class);
        $this->call(Tabla_Municipio::class);
        $this->call(Tabla_Sedes::class);
        $this->call(Tabla_Parametros::class);
        $this->call(Tabla_Areas::class);
        $this->call(Tabla_Niveles::class);
        $this->call(Tabla_Cargos::class);
        $this->call(Tabla_TiposReposicion::class);
        $this->call(Tabla_AreasInfluencia::class);
        $this->call(Tabla_Usuarios::class);
        $this->call(Tabla_TipoPQR::class);
        $this->call(Tabla_prioridades::class);
        $this->call(Tabla_EstadosPQR::class);
        $this->call(Tabla_Motivos::class);
        $this->call(Tabla_SubMotivos::class);
        $this->call(Tabla_Categorias::class);
        $this->call(Tabla_Productos::class);
        $this->call(Tabla_Marcas::class);
        $this->call(Tabla_Referencias::class);
        $this->call(Tabla_Servicios::class);
        $this->call(Tabla_DiasFestivos::class);
        $this->call(Tabla_Tareas::class);
    }

    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
