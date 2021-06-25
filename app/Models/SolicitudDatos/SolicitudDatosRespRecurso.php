<?php

namespace App\Models\SolicitudDatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudDatos\SolicitudDatosRecurso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudDatos\SolicitudDatosDocRespRecurso;

class SolicitudDatosRespRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'resprecursos_soli_datos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function recurso()
    {
        return $this->belongsTo(SolicitudDatosRecurso::class, 'recursos_soli_datos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SolicitudDatosDocRespRecurso::class, 'resprecursos_soli_datos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
