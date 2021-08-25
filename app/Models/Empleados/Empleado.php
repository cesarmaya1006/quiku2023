<?php

namespace App\Models\Empleados;

use App\Models\PQR\PQR;
use App\Models\Admin\Cargo;
use App\Models\PQR\Peticion;
use App\Models\Empresas\Sede;
use App\Models\Admin\Tipo_Docu;
use App\Models\Empresas\Empresa;
use App\Models\PQR\HistorialTarea;
use App\Models\PQR\HistorialPeticion;
use App\Models\PQR\HistorialAsignacion;
use App\Models\PQR\PqrAnexo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'empleados';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tipos_docu()
    {
        return $this->belongsTo(Tipo_Docu::class, 'docutipos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function peticiones()
    {
        return $this->hasMany(Peticion::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historial()
    {
        return $this->hasMany(HistorialAsignacion::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialTareas()
    {
        return $this->hasMany(HistorialTarea::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialpeticiones()
    {
        return $this->hasMany(HistorialPeticion::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id');
    }
    //----------------------------------------------------------------------------------
    public function sugerencias()
    {
        return $this->hasMany(Sugerencia::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function solicitudDocInfo()
    {
        return $this->hasMany(SolicitudDocInfo::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pqranexos()
    {
        return $this->hasMany(PqrAnexo::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
