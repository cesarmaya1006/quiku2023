<?php

namespace App\Models\Tutela;

use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Tutela\RespuestaPretensiones;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistorialRespuestaPretension extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'historial_respuesta_pretension';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function respuesta()
    {
        return $this->belongsTo(RespuestaPretensiones::class, 'respuesta_pretension_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
