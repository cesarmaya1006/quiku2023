<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DocRespRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'doc_resprecursos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuestarecurso()
    {
        return $this->belongsTo(RespRecurso::class, 'resprecursos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
