<?php

namespace App\Models\ConceptosUOpiniones;

use App\Models\PQR\RespRecurso;
use App\Models\PQR\TipoReposicion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsulta;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionDocRecurso;

class ConceptoUOpinionRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'recursos_con_acla';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(ConceptoUOpinionConsulta::class, 'conceptouopinionconsultas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(ConceptoUOpinionDocRecurso::class, 'recursos_con_acla_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tiporeposicion()
    {
        return $this->belongsTo(TipoReposicion::class, 'tipo_reposicion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestarecurso()
    {
        return $this->hasOne(ConceptoUOpinionRespRecurso::class, 'recursos_con_acla_id', 'id');
    }
    //----------------------------------------------------------------------------------
}