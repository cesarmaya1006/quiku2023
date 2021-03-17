<?php

namespace App\Exports;

use App\Models\Empresas\Empleado;
use App\Models\Empresas\Empresa;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmpleadosExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(int $empresa_id)
    {
        $this->empresa_id = $empresa_id;
    }

    public function query()
    {
        $empleados = Empleado::where('empresa_id', $this->empresa_id)->with('usuario')->with('cargo');
        $empleados_exp = $empleados;

        return $empleados_exp;
    }
    public function map($empleados_exp): array
    {

        return [
            $empleados_exp->id,
            $empleados_exp->usuario->tipos_docu->abreb_id,
            $empleados_exp->usuario->identificacion,
            $empleados_exp->usuario->nombres,
            $empleados_exp->usuario->apellidos,
            $empleados_exp->cargo->cargo,
            $empleados_exp->vinculacion,
            $empleados_exp->usuario->email,
            $empleados_exp->usuario->telefono
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Tipo Doc',
            'Identificación',
            'Nombres',
            'Apellidos',
            'Cargo',
            'Vinculación',
            'Email',
            'Telefono',
        ];
    }
}
