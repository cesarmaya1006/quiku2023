<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PrimeraInstancia extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'sentenciapinstancia';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->hasOne(AutoAdmisorio::class, 'id');
    }
    //----------------------------------------------------------------------------------
    public function anexosPrimeraInstancia()
    {
        return $this->hasMany(AnexoPrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function resuelvesPrimeraInstancia()
    {
        return $this->hasMany(ResuelvePrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function impugnacionesexternas()
    {
        return $this->hasMany(ImpugnacionExterna::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function impugnacionesinternas()
    {
        return $this->hasMany(ImpugnacionInterna::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestasImpugnacionesiInternas()
    {
        return $this->hasMany(RespuestaImpugnaciones::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function sentenciaphistorial()
    {
        return $this->hasMany(SentenciaPHistorial::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
