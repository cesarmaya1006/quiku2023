<?php

namespace App\Models\Tutela;

use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ImpugnacionInternaHistorial extends Model
{

    use HasFactory, Notifiable;
    protected $table = 'historial_impugnacion_interna';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function impugnacioninterna()
    {
        return $this->belongsTo(ImpugnacionInterna::class, 'impugnacion_interna_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
