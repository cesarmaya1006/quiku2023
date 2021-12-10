<?php

namespace App\Models\Tutela;

use App\Models\Tutela\Tarea;
use App\Models\Empleados\Empleado;
use App\Models\Tutela\AutoAdmisorio;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tutela\AsignacionEstados;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AsignacionTarea extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'asignancion_tareas_tutela';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'tareas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->belongsTo(AutoAdmisorio::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estadotarea()
    {
        return $this->belongsTo(AsignacionEstados::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
