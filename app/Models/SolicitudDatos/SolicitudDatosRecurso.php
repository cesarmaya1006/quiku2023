<?php

namespace App\Models\SolicitudDatos;

use App\Models\PQR\TipoReposicion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudDatos\SolicitudDatosSolicitud;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudDatos\SolicitudDatosDocRecurso;
use App\Models\SolicitudDatos\SolicitudDatosRespRecurso;

class SolicitudDatosRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'recursos_soli_datos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(SolicitudDatosSolicitud::class, 'solicituddatossolicitudes_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SolicitudDatosDocRecurso::class, 'recursos_soli_datos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tiporeposicion()
    {
        return $this->belongsTo(TipoReposicion::class, 'tipo_reposicion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestarecurso()
    {
        return $this->hasOne(SolicitudDatosRespRecurso::class, 'recursos_soli_datos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}