<?php

namespace App\Models\Denuncias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Denuncias\DenunciaDocRespuesta;
use App\Models\Denuncias\DenunciaIrregularidad;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaRespuesta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'respuesta_rep_irre';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(DenunciaIrregularidad::class, 'denunciairregularidades_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(DenunciaDocRespuesta::class, 'respuesta_rep_irre_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
