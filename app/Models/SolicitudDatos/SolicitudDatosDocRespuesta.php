<?php

namespace App\Models\SolicitudDatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudDatos\SolicitudDatosRespuesta;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SolicitudDatosDocRespuesta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrespuesta_soli_datos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(SolicitudDatosRespuesta::class, 'respuesta_soli_datos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
