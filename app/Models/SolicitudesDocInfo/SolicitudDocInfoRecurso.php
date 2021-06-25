<?php

namespace App\Models\SolicitudesDocInfo;

use App\Models\PQR\TipoReposicion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoPeticion;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoDocRecurso;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoRespRecurso;

class SolicitudDocInfoRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'recursos_soli_info';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(SolicitudDocInfoPeticion::class, 'solicituddocinfopeticiones_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SolicitudDocInfoDocRecurso::class, 'recursos_soli_info_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tiporeposicion()
    {
        return $this->belongsTo(TipoReposicion::class, 'tipo_reposicion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestarecurso()
    {
        return $this->hasOne(SolicitudDocInfoRespRecurso::class, 'recursos_soli_info_id', 'id');
    }
    //----------------------------------------------------------------------------------
}