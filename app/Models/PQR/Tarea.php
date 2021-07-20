<?php

namespace App\Models\PQR;

use App\Models\PQR\AsignacionTarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarea extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'tareas';
    protected $guarded = [];
    
    //----------------------------------------------------------------------------------
    public function tareas()
    {
        return $this->hasMany(AsignacionTarea::class, 'tareas_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
