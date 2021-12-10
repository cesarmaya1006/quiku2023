<?php

namespace App\Models\Tutela;

use App\Models\Tutela\RespuestaHechos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocRespuestaHecho extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrespuesta_hechos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(RespuestaHechos::class, 'respuesta_hechos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
