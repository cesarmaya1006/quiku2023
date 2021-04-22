<?php

namespace App\Models\SolicitudDatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudDatos\SolicitudDatosSolicitud;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SolicitudDatosAnexo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'solicituddatosanexos';
    protected $guarded = [];
    
    public function peticion()
    {
        return $this->belongsTo(SolicitudDatosSolicitud::class, 'solicituddatossolicitud_id', 'id');
    }
}
