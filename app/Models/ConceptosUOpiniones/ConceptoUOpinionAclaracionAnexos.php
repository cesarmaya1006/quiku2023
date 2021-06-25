<?php

namespace App\Models\ConceptosUOpiniones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionAclaracion;

class ConceptoUOpinionAclaracionAnexos extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'aclaracionanexos_con_acla';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function aclaracion()
    {
        return $this->belongsTo(ConceptoUOpinionAclaracion::class, 'aclaracion_con_acla_id', 'id');
    }
    //----------------------------------------------------------------------------------
    
}
