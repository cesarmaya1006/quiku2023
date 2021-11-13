<?php

namespace App\Models\Admin;

use App\Models\PQR\Motivo;
use App\Models\PQR\SubMotivo;
use App\Models\PQR\tipoPQR;
use App\Models\Productos\Categoria;
use App\Models\Productos\Marca;
use App\Models\Productos\Producto;
use App\Models\Productos\Referencia;
use App\Models\Servicios\Servicio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuAsociacionDoc extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikudocasociaciones';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tipopqr()
    {
        return $this->hasMany(tipoPQR::class, 'id', 'tipo_p_q_r_id');
    }
    //----------------------------------------------------------------------------------
    public function motivo_pqr()
    {
        return $this->hasMany(Motivo::class, 'id', 'motivo_id');
    }
    //----------------------------------------------------------------------------------
    public function submotivo_pqr()
    {
        return $this->hasMany(SubMotivo::class, 'id', 'motivo_sub_id');
    }
    //----------------------------------------------------------------------------------
    public function servicio()
    {
        return $this->hasMany(Servicio::class, 'id', 'servicio_id');
    }
    //----------------------------------------------------------------------------------
    public function categoria()
    {
        return $this->hasMany(Categoria::class, 'id', 'categoria_id');
    }
    //----------------------------------------------------------------------------------
    public function producto()
    {
        return $this->hasMany(Producto::class, 'id', 'producto_id');
    }
    //----------------------------------------------------------------------------------
    public function marca()
    {
        return $this->hasMany(Marca::class, 'id', 'marca_id');
    }
    //----------------------------------------------------------------------------------
    public function referencia()
    {
        return $this->hasMany(Referencia::class, 'id', 'referencia_id');
    }
    //----------------------------------------------------------------------------------
    public function doctrinas()
    {
        return $this->belongsToMany(WikuDoctrina::class, 'wiku_doctrina_id', 'id');
    }
}
