<?php

namespace App\Models\SolicitudesDocInfo;

use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoAnexo;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoRecurso;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoRespuesta;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoAclaracion;

class SolicitudDocInfoPeticion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'solicituddocinfopeticiones';
    protected $guarded = [];

    public function peticion()
    {
        return $this->belongsTo(SolicitudDocInfo::class, 'solicituddocinfo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SolicitudDocInfoAnexo::class, 'solicituddocinfopeticion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function aclaraciones()
    {
        return $this->hasMany(SolicitudDocInfoAclaracion::class, 'solicituddocinfopeticiones_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->hasOne(SolicitudDocInfoRespuesta::class, 'solicituddocinfopeticiones_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function recursos()
    {
        return $this->hasMany(SolicitudDocInfoRecurso::class, 'solicituddocinfopeticiones_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
