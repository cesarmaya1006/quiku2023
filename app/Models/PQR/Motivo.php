<?php

namespace App\Models\PQR;

use App\Models\Admin\WikuAsociacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Motivo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'motivos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function sub_motivos()
    {
        return $this->hasMany(SubMotivo::class, 'motivo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipo_pqr()
    {
        return $this->belongsTo(tipoPQR::class, 'tipo_pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_normas()
    {
        return $this->hasMany(WikuAsociacion::class, 'motivo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
