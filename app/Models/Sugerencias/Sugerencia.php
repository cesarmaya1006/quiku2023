<?php

namespace App\Models\Sugerencias;

use App\Models\PQR\PQR;
use App\Models\PQR\Estado;
use App\Models\PQR\tipoPQR;
use App\Models\Empresas\Sede;
use App\Models\Empresas\Empresa;
use App\Models\Personas\Persona;
use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Sugerencias\SugerenciaDoc;
use App\Models\Sugerencias\SugerenciaHecho;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sugerencia extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'sugerencias';
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
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function hechos()
    {
        return $this->hasMany(SugerenciaHecho::class, 'sugerencia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SugerenciaDoc::class, 'sugerencia_id', 'id');
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
}
