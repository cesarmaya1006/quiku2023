<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Anexosentenciaseg extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'anexosentenciaseg';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function sentencia()
    {
        return $this->belongsTo(Sentenciaseginstancia::class, 'sentenciaseginstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
