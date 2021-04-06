<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DocRespuesta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrespuesta';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(Respuesta::class, 'respuesta_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
