<?php

namespace App\Models\Denuncias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Denuncias\DenunciaRespuesta;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaDocRespuesta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrespuesta_rep_irre';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(DenunciaRespuesta::class, 'respuesta_rep_irre_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
