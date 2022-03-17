<?php

namespace App\Models\Tutela;

use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ImpugnacionInterna extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'impugnacion_interna';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function sentenciap()
    {
        return $this->belongsTo(PrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialimpugnacioninterna()
    {
        return $this->hasMany(ImpugnacionInternaHistorial::class, 'impugnacion_interna_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estado()
    {
        return $this->belongsTo(AsignacionEstados::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function resuelves()
    {
        return $this->belongsToMany(ResuelvePrimeraInstancia::class, 'impugnacion_interna_resuelve', 'impugnacion_interna_id', 'resuelve_primera_instancia_id');
    }
    //----------------------------------------------------------------------------------
    public function relacionesimpugnacion()
    {
        return $this->hasMany(RelacionesImpugnacion::class, 'impugnacion_interna_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function docImpugnacionInterna()
    {
        return $this->hasMany(ImpugnacionInternaDoc::class, 'impugnacion_interna_id', 'id');
    }
}
