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
    public function impugnacionexterna()
    {
        return $this->belongsToMany(ImpugnacionExterna::class, 'impugnacion_externa_resuelve');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function impugnacioninterna()
    {
        return $this->belongsToMany(ImpugnacionInterna::class, 'impugnacion_interna_resuelve');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function sentenciaphistorial()
    {
        return $this->hasMany(SentenciaPHistorial::class, 'resuelvesentencia_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
