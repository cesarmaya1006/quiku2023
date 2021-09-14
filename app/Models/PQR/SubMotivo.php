<?php

namespace App\Models\PQR;

use App\Models\Admin\WikuAsociacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubMotivo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'motivo_sub';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function motivo()
    {
        return $this->belongsTo(Motivo::class, 'motivo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_normas()
    {
        return $this->hasMany(WikuAsociacion::class, 'motivo_sub_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
