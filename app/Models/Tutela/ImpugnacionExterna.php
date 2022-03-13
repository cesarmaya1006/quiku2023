<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ImpugnacionExterna extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'impugnacion_externa';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function sentenciap()
    {
        return $this->belongsTo(PrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //==================================================================================
    public function accion()
    {
        return $this->belongsToMany(Accions::class, 'impugnacion_externa_accion', 'impugnacion_externa_id', 'accionante_accionado_id');
    }
    //==================================================================================
    //==================================================================================
    public function resuelves()
    {
        return $this->belongsToMany(ResuelvePrimeraInstancia::class, 'impugnacion_externa_resuelve', 'impugnacion_externa_id', 'resuelve_primera_instancia_id');
    }
    //==================================================================================
}
