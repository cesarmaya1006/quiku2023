<?php

namespace App\Models\Tutela;

use App\Models\Empleados\Empleado;
use App\Models\Tutela\AutoAdmisorio;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tutela\AsignacionEstados;
use Illuminate\Notifications\Notifiable;
use App\Models\Tutela\RelacionPretension;
use App\Models\Tutela\DocRespuestaPretension;
use App\Models\Tutela\HistorialRespuestaPretension;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RespuestaPretensiones extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'respuesta_pretensiones';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function relacion()
    {
        return $this->hasMany(RelacionPretension::class, 'respuesta_pretensiones_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(DocRespuestaPretension::class, 'respuesta_pretensiones_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->belongsTo(AutoAdmisorio::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estadorespuestapretension()
    {
        return $this->belongsTo(AsignacionEstados::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historial()
    {
        return $this->hasMany(HistorialRespuestaPretension::class, 'respuesta_pretension_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
