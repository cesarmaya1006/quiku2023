<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Tutela\RespuestaPretensiones;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocRespuestaPretension extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrespuesta_pretensiones';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(RespuestaPretensiones::class, 'respuesta_pretensiones_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
