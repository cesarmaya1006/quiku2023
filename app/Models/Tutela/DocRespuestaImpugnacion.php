<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DocRespuestaImpugnacion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrespuestas_impugnaciones';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(RespuestaImpugnaciones::class, 'respuesta_impugnaciones_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
