<?php

namespace App\Models\Denuncias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Denuncias\DenunciaRecurso;
use App\Models\Denuncias\DenunciaDocRespRecurso;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaRespRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'resprecursos_rep_irre';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function recurso()
    {
        return $this->belongsTo(DenunciaRecurso::class, 'recursos_rep_irre_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(DenunciaDocRespRecurso::class, 'resprecursos_rep_irre_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
