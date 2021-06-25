<?php

namespace App\Models\Denuncias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Denuncias\DenunciaRecurso;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaDocRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrecursos_rep_irre';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function recurso()
    {
        return $this->belongsTo(DenunciaRecurso::class, 'recursos_rep_irre_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
