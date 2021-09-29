<?php

namespace App\Models\PQR;

use App\Models\PQR\Estado;
use App\Models\PQR\tipoPQR;
use App\Models\PQR\Peticion;
use App\Models\PQR\PqrAnexo;
use App\Models\PQR\Resuelve;
use App\Models\Empresas\Sede;
use App\Models\Admin\Municipio;
use App\Models\Empresas\Empresa;
use App\Models\Personas\Persona;
use App\Models\Empleados\Empleado;
use App\Models\PQR\HistorialTarea;
use App\Models\Servicios\Servicio;
use App\Models\Productos\Referencia;
use App\Models\PQR\HistorialPeticion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PQR extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'pqr';
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
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function referencia()
    {
        return $this->belongsTo(Referencia::class, 'referencia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function peticiones()
    {
        return $this->hasMany(Peticion::class, 'pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipoPqr()
    {
        return $this->belongsTo(tipoPQR::class, 'tipo_pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estadospqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function prioridad()
    {
        return $this->belongsTo(Prioridad::class, 'prioridad_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialasignacion()
    {
        return $this->hasMany(HistorialAsignacion::class, 'pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialtareas()
    {
        return $this->hasMany(HistorialTarea::class, 'pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialpeticiones()
    {
        return $this->hasMany(HistorialPeticion::class, 'pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asignaciontareas()
    {
        return $this->hasMany(AsignacionTarea::class, 'pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function anexos()
    {
        return $this->hasMany(PqrAnexo::class, 'pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function resuelves()
    {
        return $this->hasMany(Resuelve::class, 'pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
