<?php

namespace App\Models\ConceptosUOpiniones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionRespRecurso;

class ConceptoUOpinionDocRespRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'doc_resprecursos_con_acla';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuestarecurso()
    {
        return $this->belongsTo(ConceptoUOpinionRespRecurso::class, 'resprecursos_con_acla_id', 'id');
    }
    //----------------------------------------------------------------------------------
}

