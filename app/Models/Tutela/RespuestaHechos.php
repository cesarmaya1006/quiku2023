<?php

namespace App\Models\Tutela;

use App\Models\Tutela\AutoAdmisorio;
use App\Models\Tutela\RelacionHecho;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tutela\AsignacionEstados;
use App\Models\Tutela\DocRespuestaHecho;
use Illuminate\Notifications\Notifiable;
use App\Models\Tutela\HistorialRespuestaHecho;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RespuestaHechos extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'respuesta_hechos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function relacion()
    {
        return $this->hasMany(RelacionHecho::class, 'respuesta_hechos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(DocRespuestaHecho::class, 'respuesta_hechos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->belongsTo(AutoAdmisorio::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estadorepuestahecho()
    {
        return $this->belongsTo(AsignacionEstados::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historial()
    {
        return $this->hasMany(HistorialRespuestaHecho::class, 'respuesta_hecho_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
