<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Recurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'recursos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(Peticion::class, 'peticion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(DocRecurso::class, 'respuesta_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tiporeposicion()
    {
        return $this->hasMany(tiporeposicion::class, 'tipo_reposicion_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
