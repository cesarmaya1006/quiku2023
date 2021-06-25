<?php

namespace App\Models\ConceptosUOpiniones;

use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\ConceptosUOpiniones\ConceptoUOpinion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionRecurso;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionRespuesta;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionAclaracion;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsultaAnexo;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsultaHecho;

class ConceptoUOpinionConsulta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'conceptouopinionconsultas';
    protected $guarded = [];

    public function consulta()
    {
        return $this->belongsTo(ConceptoUOpinion::class, 'conceptouopinion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function hechos()
    {
        return $this->hasMany(ConceptoUOpinionConsultaHecho::class, 'conceptouopinionconsultas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(ConceptoUOpinionConsultaAnexo::class, 'conceptouopinionconsultas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function aclaraciones()
    {
        return $this->hasMany(ConceptoUOpinionAclaracion::class, 'conceptouopinionconsultas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->hasOne(ConceptoUOpinionRespuesta::class, 'conceptouopinionconsultas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function recursos()
    {
        return $this->hasMany(ConceptoUOpinionRecurso::class, 'conceptouopinionconsultas_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
