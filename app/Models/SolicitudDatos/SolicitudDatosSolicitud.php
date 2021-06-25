<?php

namespace App\Models\SolicitudDatos;

use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Models\SolicitudDatos\SolicitudDatosAnexo;
use App\Models\SolicitudDatos\SolicitudDatosRecurso;
use App\Models\SolicitudDatos\SolicitudDatosRespuesta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudDatos\SolicitudDatosAclaracion;

class SolicitudDatosSolicitud extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'solicituddatossolicitudes';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function solicitud()
    {
        return $this->belongsTo(SolicitudDatos::class, 'solicituddatos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SolicitudDatosAnexo::class, 'solicituddatossolicitud_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function aclaraciones()
    {
        return $this->hasMany(SolicitudDatosAclaracion::class, 'solicituddatossolicitudes_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->hasOne(SolicitudDatosRespuesta::class, 'solicituddatossolicitudes_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function recursos()
    {
        return $this->hasMany(SolicitudDatosRecurso::class, 'solicituddatossolicitudes_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
