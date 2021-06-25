<?php

namespace App\Models\Denuncias;

use App\Models\PQR\TipoReposicion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Denuncias\DenunciaDocRecurso;
use App\Models\Denuncias\DenunciaRespRecurso;
use App\Models\Denuncias\DenunciaIrregularidad;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'recursos_rep_irre';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(DenunciaIrregularidad::class, 'denunciairregularidades_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(DenunciaDocRecurso::class, 'recursos_rep_irre_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tiporeposicion()
    {
        return $this->belongsTo(TipoReposicion::class, 'tipo_reposicion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestarecurso()
    {
        return $this->hasOne(DenunciaRespRecurso::class, 'recursos_rep_irre_id', 'id');
    }
    //----------------------------------------------------------------------------------
}