<?php

namespace App\Models\SolicitudesDocInfo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoRecurso;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoDocRespRecurso;

class SolicitudDocInfoRespRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'resprecursos_soli_info';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function recurso()
    {
        return $this->belongsTo(SolicitudDocInfoRecurso::class, 'recursos_soli_info_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SolicitudDocInfoDocRespRecurso::class, 'resprecursos_soli_info_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
