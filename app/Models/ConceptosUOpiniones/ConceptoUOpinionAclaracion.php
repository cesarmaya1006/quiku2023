<?php

namespace App\Models\ConceptosUOpiniones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsulta;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionAclaracionAnexos;

class ConceptoUOpinionAclaracion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'aclaracion_con_acla';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(ConceptoUOpinionConsulta::class, 'conceptouopinionconsultas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function anexos()
    {
        return $this->hasMany(ConceptoUOpinionAclaracionAnexos::class, 'aclaracion_con_acla_id', 'id');
    }
    //----------------------------------------------------------------------------------
}