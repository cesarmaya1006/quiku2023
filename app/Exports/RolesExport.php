<?php

namespace App\Exports;

use App\Models\Admin\Rol;
use Maatwebsite\Excel\Concerns\FromCollection;

class RolesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Rol::select('id', 'nombre')->get();
    }
}
