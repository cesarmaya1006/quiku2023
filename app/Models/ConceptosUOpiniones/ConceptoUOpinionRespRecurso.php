<?php

namespace App\Models\ConceptosUOpiniones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionRecurso;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionDocRespRecurso;

class ConceptoUOpinionRespRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'resprecursos_con_acla';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function recurso()
    {
        return $this->belongsTo(ConceptoUOpinionRecurso::class, 'recurso_con_acla_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(ConceptoUOpinionDocRespRecurso::class, 'resprecursos_con_acla_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
