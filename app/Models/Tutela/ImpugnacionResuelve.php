<?php

namespace App\Models\Tutela;

use App\Models\Empleados\Empleado;
use Database\Seeders\PrimeraInstanciaResuelve;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ImpugnacionResuelve extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'impugnacionresuelve';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function impugnacion()
    {
        return $this->belongsTo(Impugnacion::class, 'impugnacion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function estado()
    {
        return $this->belongsTo(ImpugnacionResuelveEstado::class, 'impugnacionresuelve_estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function resuelves()
    {
        return $this->belongsToMany(ResuelvePrimeraInstancia::class, 'impugnacionresuelve_resuelvesentencia', 'impugnacion_resuelve_id', 'resuelve_primera_instancia_id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function accionantes()
    {
        return $this->belongsToMany(Accions::class, 'impugnacion_accionante', 'impugnacionresuelve_id', 'accionante_accionado_id');
    }
    //----------------------------------------------------------------------------------

}
