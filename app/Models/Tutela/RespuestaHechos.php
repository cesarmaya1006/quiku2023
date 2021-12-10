<?php

namespace App\Models\Tutela;

use App\Models\Tutela\HechosTutela;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tutela\DocRespuestaHecho;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RespuestaHechos extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'respuesta_hechos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function hecho()
    {
        return $this->belongsTo(HechosTutela::class, 'hechos_tutela_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(DocRespuestaHecho::class, 'respuesta_hechos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
