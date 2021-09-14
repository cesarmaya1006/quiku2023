<?php

namespace App\Models\PQR;

use App\Models\Admin\WikuAsociacion;
use App\Models\Admin\WikuNorma;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class tipoPQR extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'tipo_pqr';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function motivos()
    {
        return $this->hasMany(Motivo::class, 'tipo_pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'tipo_pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_normas()
    {
        return $this->hasMany(WikuAsociacion::class, 'tipo_pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacionnorma()
    {
        return $this->belongsToMany(WikuNorma::class, 'wikuasociaciones');
    }
}
