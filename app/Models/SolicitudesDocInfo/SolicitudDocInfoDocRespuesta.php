<?php

namespace App\Models\SolicitudesDocInfo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoRespuesta;

class SolicitudDocInfoDocRespuesta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrespuesta_soli_info';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(SolicitudDocInfoRespuesta::class, 'respuesta_soli_info_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
