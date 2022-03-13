<?php

namespace App\Models\Tutela;

use App\Models\Tutela\AsignacionTarea;
use App\Models\Tutela\RespuestaHechos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Tutela\RespuestaPretensiones;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AsignacionEstados extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'asignacion_estados_tutela';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function estados()
    {
        return $this->hasMany(AsignacionTarea::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estadoshechos()
    {
        return $this->hasMany(HechosTutela::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estadosrespuestahechos()
    {
        return $this->hasMany(RespuestaHechos::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estadospretensiones()
    {
        return $this->hasMany(PretensionesTutela::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estadosrespuestapretensiones()
    {
        return $this->hasMany(RespuestaPretensiones::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estadosimpugnacionexterna()
    {
        return $this->hasMany(ImpugnacionExterna::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
