<?php

namespace App\Models\ConceptosUOpiniones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsulta;

class ConceptoUOpinionConsultaAnexo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'conceptouopinionconsultasanexos';
    protected $guarded = [];
    
    public function consulta()
    {
        return $this->belongsTo(ConceptoUOpinionConsulta::class, 'conceptouopinionconsultas_id', 'id');
    }
}
