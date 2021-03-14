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
            'docutipos', 'roles', 'usuarios', 'menu', 'menu_rol', 'icono',
            'empresas', 'jurisdiccion_juzgado', 'juzgdepartamentos', 'distritos', 'circuitos',
            'juzgmunicipios', 'juzgados', 'papel', 'tipo_proceso', 'estado_proceso', 'etapa_proceso',
            'riesgo_perdida', 'sentidos_fallo', 'terminacion_anormal', 'procesos', 'apoderados_proceso',
            'asistente_proceso', 'demandante', 'demandados', 'empresas_procesos', 'hv_nivel', 'hv_area', 'hv_cargo',
            'pais', 'departamento', 'municipio', 'empleados', 'opcionarchivo', 'empleadoarchivo', 'empresaclientes',
            'empresaproveedores', 'proyectos','proyectoempleados'

        ]);
        // --------------------------------------------------------------------------------------------------
        $this->call(Tabla_DocuTipos::class);
        $this->call(Tabla_Roles::class);
        $this->call(Tabla_Usuarios::class);
        $this->call(Tabla_Menu::class);
        $this->call(Tabla_MenuRol::class);
        $this->call(Tabla_Icono::class);
        $this->call(Tabla_Empresas::class);
        $this->call(TablaJurisdiccionJuzgadoSeeder::class);
        $this->call(TablajuzgadoDepartamentos::class);
        $this->call(TablaDistritos::class);
        $this->call(Tabla_Circuitos::class);
        $this->call(Tabla_JuzgMunicipios::class);
        $this->call(Tabla_Juzgado::class);
        $this->call(Tabla_papel::class);
        $this->call(Tabla_TipoProceso::class);
        $this->call(Tabla_EstadoProceso::class);
        $this->call(Tabla_Etapa_Proceso::class);
        $this->call(Tabla_Riesgo_Perdida::class);
        $this->call(Tabla_Sentidos_Fallo::class);
        $this->call(Tabla_Terminacion_Anormal::class);
        $this->call(Tabla_Procesos::class);
        $this->call(Tabla_Apoderados_Procesos::class);
        $this->call(Tabla_Asistente_Proceso::class);
        $this->call(Tabla_Demandante::class);
        $this->call(Tabla_Demandados::class);
        $this->call(Tabla_EmpresasProcesos::class);
        $this->call(Tabla_HvNivel::class);
        $this->call(Tabla_HvArea::class);
        $this->call(Tabla_HvCargo::class);
        $this->call(Tabla_Pais::class);
        $this->call(Tabla_Departamento::class);
        $this->call(Tabla_Municipio::class);
        $this->call(Tabla_Empleado::class);
        $this->call(Tabla_OpcionesArchivo::class);
        $this->call(Tabla_EmpleadoArchivo::class);
        $this->call(Tabla_EmpresaClientes::class);
        $this->call(Tabla_EmpresaProveedores::class);
        $this->call(Tabla_Proyectos::class);
        $this->call(Tabla_EmpleadosProyecto::class);


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
