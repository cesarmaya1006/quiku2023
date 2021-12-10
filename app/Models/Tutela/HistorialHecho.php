<?php

namespace App\Models\Tutela;

use App\Models\Empleados\Empleado;
use App\Models\Tutela\HechosTutela;
use App\Models\Tutela\AutoAdmisorio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistorialHecho extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'historial_hechos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->belongsTo(AutoAdmisorio::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function hecho()
    {
        return $this->belongsTo(HechosTutela::class, 'hechos_tutela_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
