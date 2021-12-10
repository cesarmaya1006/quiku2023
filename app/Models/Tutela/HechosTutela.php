<?php

namespace App\Models\Tutela;

use App\Models\Empleados\Empleado;
use App\Models\Tutela\AutoAdmisorio;
use App\Models\Tutela\HistorialHecho;
use App\Models\Tutela\RespuestaHechos;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tutela\AsignacionEstados;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HechosTutela extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'hechos_tutela';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->belongsTo(AutoAdmisorio::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->hasOne(RespuestaHechos::class, 'hechos_tutela_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialHechos()
    {
        return $this->hasMany(HistorialHecho::class, 'hechos_tutela_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estadohecho()
    {
        return $this->belongsTo(AsignacionEstados::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
