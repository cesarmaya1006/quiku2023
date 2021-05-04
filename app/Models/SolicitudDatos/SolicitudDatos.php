<?php

namespace App\Models\SolicitudDatos;

use App\Models\Empresas\Empresa;
use App\Models\Personas\Persona;
use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudDatos\SolicitudDatosSolicitud;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SolicitudDatos extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'solicituddatos';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function solicitudes()
    {
        return $this->hasMany(SolicitudDatosSolicitud::class, 'solicituddatos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipoPqr()
    {
        return $this->belongsTo(tipoPQR::class, 'tipo_pqr_id', 'id');
    }
}
