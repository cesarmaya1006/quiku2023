<?php

namespace App\Models\Tutela;

use App\Models\Tutela\HechosTutela;
use App\Models\Tutela\AutoAdmisorio;
use App\Models\Tutela\RespuestaHechos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RelacionHecho extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'relacion_respuesta_hechos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->belongsTo(AutoAdmisorio::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function hecho()
    {
        return $this->belongsTo(HechosTutela::class, 'hecho_tutela_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(RespuestaHechos::class, 'respuesta_hechos_id', 'id');
    }
    //----------------------------------------------------------------------------------

}