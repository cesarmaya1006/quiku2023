<?php

namespace App\Models\Tutela;

use App\Models\PQR\Prioridad;
use App\Models\Tutela\Accions;
use App\Models\Tutela\Estados;
use App\Models\Empleados\Empleado;
use App\Models\Tutela\AnexoTutela;
use App\Models\Tutela\HechosTutela;
use App\Models\Tutela\MotivosTutela;
use App\Models\Tutela\PruebasTutela;
use App\Models\Tutela\RelacionHecho;
use App\Models\Tutela\UnidadNegocio;
use App\Models\Tutela\ResuelveTutela;
use App\Models\Tutela\HistorialTareas;
use App\Models\Tutela\RespuestaHechos;
use App\Models\Tutela\ArgumentosTutela;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Tutela\PretensionesTutela;
use App\Models\Tutela\RelacionPretension;
use App\Models\Tutela\HistorialAsignacion;
use App\Models\Tutela\RespuestaPretensiones;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AutoAdmisorio extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'auto_admisorio';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function estado()
    {
        return $this->belongsTo(Estados::class, 'estadostutela_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function prioridad()
    {
        return $this->belongsTo(Prioridad::class, 'prioridad_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function unidadNegocio()
    {
        return $this->belongsTo(UnidadNegocio::class, 'unidad_negocio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function accions()
    {
        return $this->hasMany(Accions::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function anexostutela()
    {
        return $this->hasMany(AnexoTutela::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function hechos()
    {
        return $this->hasMany(HechosTutela::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pretensiones()
    {
        return $this->hasMany(PretensionesTutela::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function argumentos()
    {
        return $this->hasMany(ArgumentosTutela::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pruebas()
    {
        return $this->hasMany(PruebasTutela::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function motivos()
    {
        return $this->hasMany(MotivosTutela::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleadoregistro()
    {
        return $this->belongsTo(Empleado::class, 'empleado_rigistro_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleadoasignado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_asignado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialasignacion()
    {
        return $this->hasMany(HistorialAsignacion::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asignaciontareas()
    {
        return $this->hasMany(AsignacionTarea::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialtareas()
    {
        return $this->hasMany(HistorialTareas::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestas()
    {
        return $this->hasMany(TutelaRespuesta::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function relacionesPretensiones()
    {
        return $this->hasMany(RelacionPretension::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestasPretensiones()
    {
        return $this->hasMany(RespuestaPretensiones::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function relacioneshechos()
    {
        return $this->hasMany(RelacionHecho::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestasHechos()
    {
        return $this->hasMany(RespuestaHechos::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function resuelves()
    {
        return $this->hasMany(ResuelveTutela::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function primeraInstancia()
    {
        return $this->belongsTo(PrimeraInstancia::class, 'id');
    }
}
