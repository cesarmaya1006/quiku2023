<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Aclaracion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'aclaracion';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(Peticion::class, 'peticion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function anexos()
    {
        return $this->hasMany(AclaracionAnexos::class, 'aclaracion_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
