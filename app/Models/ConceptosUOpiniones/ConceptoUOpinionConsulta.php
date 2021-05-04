<?php

namespace App\Models\ConceptosUOpiniones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\ConceptosUOpiniones\ConceptoUOpinion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsultaAnexo;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsultaHecho;
use App\Models\Empleados\Empleado;

class ConceptoUOpinionConsulta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'conceptouopinionconsultas';
    protected $guarded = [];

    public function concepto()
    {
        return $this->belongsTo(ConceptoUOpinion::class, 'conceptouopinion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function hechos()
    {
        return $this->hasMany(ConceptoUOpinionConsultaHecho::class, 'conceptouopinionconsultashechos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------

    public function documentos()
    {
        return $this->hasMany(ConceptoUOpinionConsultaAnexo::class, 'conceptouopinionconsultasanexos_id', 'id');
    }
}
