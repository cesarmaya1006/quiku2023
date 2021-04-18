<?php

namespace App\Models\Sugerencias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SugerenciaHecho extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'sugerenciashechos';
    protected $guarded = [];
    
    public function sugerencia()
    {
        return $this->belongsTo(Sugerencia::class, 'sugerencia_id', 'id');
    }
}
