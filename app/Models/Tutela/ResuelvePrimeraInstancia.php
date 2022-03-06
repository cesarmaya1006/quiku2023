<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ResuelvePrimeraInstancia extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'resuelvesentencia';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function sentencia()
    {
        return $this->belongsTo(PrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function resuelves()
    {
        return $this->belongsToMany(ImpugnacionResuelve::class, 'impugnacionresuelve_resuelvesentencia');
    }
    //----------------------------------------------------------------------------------
}
