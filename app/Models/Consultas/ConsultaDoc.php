<?php

namespace App\Models\Consultas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ConsultaDoc extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'consultadoc';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function consulta()
    {
        return $this->belongsTo(consulta::class, 'consulta_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
