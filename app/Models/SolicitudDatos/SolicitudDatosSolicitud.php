<?php

namespace App\Models\SolicitudDatos;

use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Models\SolicitudDatos\SolicitudDatosAnexo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SolicitudDatosSolicitud extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'solicituddatossolicitudes';
    protected $guarded = [];

    public function solicitud()
    {
        return $this->belongsTo(SolicitudDatos::class, 'solicituddatos_id', 'id');
    }

    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SolicitudDatosAnexo::class, 'solicituddatossolicitud_id', 'id');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
