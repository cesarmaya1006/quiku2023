<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuJurisprudenciaTexto extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikujurisprudenciatexto';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function jurisprudencia()
    {
        return $this->belongsTo(WikuJurisprudencia::class, 'jurisprudencia_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
