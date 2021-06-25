<?php

namespace App\Models\ConceptosUOpiniones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionRecurso;

class ConceptoUOpinionDocRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrecursos_con_acla';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function recurso()
    {
        return $this->belongsTo(ConceptoUOpinionRecurso::class, 'recursos_con_acla_id', 'id');
    }
    //----------------------------------------------------------------------------------
}

