<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Impugnacion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'impugnacion';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function sentenciaprimera()
    {
        return $this->belongsTo(PrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function estado()
    {
        return $this->belongsTo(ImpugnacionEstado::class, 'impugnacion_estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function resuelves()
    {
        return $this->hasMany(ImpugnacionResuelve::class, 'impugnacion_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
