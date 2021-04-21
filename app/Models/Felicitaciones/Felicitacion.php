<?php

namespace App\Models\Felicitaciones;

use App\Models\Empresas\Empresa;
use App\Models\Personas\Persona;
use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Felicitaciones\FelicitacionHecho;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Felicitacion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'felicitaciones';
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
        return $this->hasMany(FelicitacionHecho::class, 'felicitacion_id', 'id');
    }
}
