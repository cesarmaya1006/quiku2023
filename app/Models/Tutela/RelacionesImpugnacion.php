<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RelacionesImpugnacion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'relacion_respuesta_impugnaciones';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function primerainstancia()
    {
        return $this->belongsTo(PrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function impugancion()
    {
        return $this->belongsTo(ImpugnacionInterna::class, 'impugnacion_interna_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(RespuestaImpugnaciones::class, 'respuesta_impugnaciones_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
