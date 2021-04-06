<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Respuesta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'respuesta';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(Peticion::class, 'peticion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(DocRespuesta::class, 'respuesta_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
