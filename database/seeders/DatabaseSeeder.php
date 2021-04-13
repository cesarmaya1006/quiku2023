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
            'docutipos', 'roles', 'menu', 'menu_rol', 'icono', 'pais', 'departamento', 'municipio', 'parametros',
            'usuarios', 'personas', 'tipo_pqr', 'motivos', 'motivo_sub'

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
        $this->call(Tabla_Parametros::class);
        $this->call(Tabla_Usuarios::class);
        $this->call(Tabla_TipoPQR::class);
        $this->call(Tabla_Motivos::class);
        $this->call(Tabla_SubMotivos::class);
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
