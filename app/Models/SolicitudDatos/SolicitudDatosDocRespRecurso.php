<?php

namespace App\Models\SolicitudDatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudDatos\SolicitudDatosRespRecurso;

class SolicitudDatosDocRespRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'doc_resprecursos_soli_datos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuestarecurso()
    {
        return $this->belongsTo(SolicitudDatosRespRecurso::class, 'resprecursos_soli_datos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}

