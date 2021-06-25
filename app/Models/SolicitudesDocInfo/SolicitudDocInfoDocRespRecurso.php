<?php

namespace App\Models\SolicitudesDocInfo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoRespRecurso;

class SolicitudDocInfoDocRespRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'doc_resprecursos_soli_info';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuestarecurso()
    {
        return $this->belongsTo(SolicitudDocInfoRespRecurso::class, 'resprecursos_soli_info_id', 'id');
    }
    //----------------------------------------------------------------------------------
}

