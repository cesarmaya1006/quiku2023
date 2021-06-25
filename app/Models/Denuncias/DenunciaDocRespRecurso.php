<?php

namespace App\Models\Denuncias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Denuncias\DenunciaRespRecurso;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaDocRespRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'doc_resprecursos_rep_irre';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuestarecurso()
    {
        return $this->belongsTo(DenunciaRespRecurso::class, 'resprecursos_rep_irre_id', 'id');
    }
    //----------------------------------------------------------------------------------
}

