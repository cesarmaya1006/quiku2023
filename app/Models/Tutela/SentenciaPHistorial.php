<?php

namespace App\Models\Tutela;

use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SentenciaPHistorial extends Model
{

    use HasFactory, Notifiable;
    protected $table = 'sentenciap_historial';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function sentenciap()
    {
        return $this->belongsTo(PrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function resuelvesentenciap()
    {
        return $this->belongsTo(ResuelvePrimeraInstancia::class, 'resuelvesentencia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
