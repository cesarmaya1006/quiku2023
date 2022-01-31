<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AnexoPrimeraInstancia extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'anexosentencia';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function sentencia()
    {
        return $this->belongsTo(PrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
