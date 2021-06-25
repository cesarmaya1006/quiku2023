<?php

namespace App\Models\SolicitudDatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudDatos\SolicitudDatosSolicitud;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudDatos\SolicitudDatosAclaracionAnexos;

class SolicitudDatosAclaracion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'aclaracion_soli_datos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(SolicitudDatosSolicitud::class, 'solicituddatossolicitudes_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function anexos()
    {
        return $this->hasMany(SolicitudDatosAclaracionAnexos::class, 'aclaracion_soli_datos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
