<?php

namespace App\Models\Tutela;

use App\Models\Tutela\AsignacionTarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
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
    public function estadospretensiones()
    {
       return $this->hasMany(PretensionesTutela::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}