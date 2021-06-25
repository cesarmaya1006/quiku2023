<?php

namespace App\Models\SolicitudesDocInfo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoPeticion;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoDocRespuesta;

class SolicitudDocInfoRespuesta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'respuesta_soli_info';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(SolicitudDocInfoPeticion::class, 'solicituddocinfopeticiones_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SolicitudDocInfoDocRespuesta::class, 'respuesta_soli_info_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
