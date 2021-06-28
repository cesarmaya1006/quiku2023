<?php

namespace App\Models\PQR;

use App\Models\Admin\Cargo;
use App\Models\Empresas\Sede;
use App\Models\Productos\Categoria;
use App\Models\Productos\Marca;
use App\Models\Productos\Referencia;
use App\Models\Servicios\Servicio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AsignacionParticular extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'asignacion_particular_pqr';
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function tipo_pqr()
    {
        return $this->belongsTo(tipoPQR::class, 'tipo_pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function motivo_pqr()
    {
        return $this->belongsTo(Motivo::class, 'motivo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function submotivo_pqr()
    {
        return $this->belongsTo(SubMotivo::class, 'motivo_sub_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function referencia()
    {
        return $this->belongsTo(Referencia::class, 'referencia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
