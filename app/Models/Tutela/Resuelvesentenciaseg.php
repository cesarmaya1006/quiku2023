<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Resuelvesentenciaseg extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'resuelvesentenciaseg';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function sentencia()
    {
        return $this->belongsTo(Sentenciaseginstancia::class, 'sentenciaseginstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
