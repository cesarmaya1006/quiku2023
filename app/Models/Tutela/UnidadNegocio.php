<?php

namespace App\Models\Tutela;

use App\Models\Empleados\Empleado;
use App\Models\Tutela\AutoAdmisorio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnidadNegocio extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'unidad_negocio';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tutelas()
    {
        return $this->hasMany(AutoAdmisorio::class, 'unidad_negocio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
