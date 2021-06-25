<?php

namespace App\Models\SolicitudDatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudDatos\SolicitudDatosAclaracion;

class SolicitudDatosAclaracionAnexos extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'aclaracionanexos_soli_datos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function aclaracion()
    {
        return $this->belongsTo(SolicitudDatosAclaracion::class, 'aclaracion_soli_datos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    
}
