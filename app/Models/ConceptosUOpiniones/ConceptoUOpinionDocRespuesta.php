<?php

namespace App\Models\ConceptosUOpiniones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionRespuesta;

class ConceptoUOpinionDocRespuesta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrespuesta_con_acla';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(ConceptoUOpinionRespuesta::class, 'respuesta_con_acla_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
