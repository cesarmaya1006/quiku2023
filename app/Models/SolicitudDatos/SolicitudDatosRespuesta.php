<?php

namespace App\Models\SolicitudDatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudDatos\SolicitudDatosSolicitud;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudDatos\SolicitudDatosDocRespuesta;

class SolicitudDatosRespuesta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'respuesta_soli_datos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(SolicitudDatosSolicitud::class, 'solicituddatossolicitudes_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SolicitudDatosDocRespuesta::class, 'respuesta_soli_datos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
