<?php

namespace App\Models\ConceptosUOpiniones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsulta;

class ConceptoUOpinionConsultaHecho extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'conceptouopinionconsultashechos';
    protected $guarded = [];
    
    public function consulta()
    {
        return $this->belongsTo(ConceptoUOpinionConsulta::class, 'conceptouopinionconsultas_id', 'id');
    }
}
