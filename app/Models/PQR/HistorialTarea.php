<?php

namespace App\Models\PQR;

use App\Models\PQR\PQR;
use App\Models\PQR\Tarea;
use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistorialTarea extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'historial_tareas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function pqr()
    {
        return $this->belongsTo(PQR::class, 'pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'tareas_id', 'id');
    }
    //----------------------------------------------------------------------------------
}