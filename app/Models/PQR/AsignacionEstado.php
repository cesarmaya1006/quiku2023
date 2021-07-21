<?php

namespace App\Models\PQR;

use App\Models\PQR\AsignacionTarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AsignacionEstado extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'asignancion_estados';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function estados()
    {
       return $this->hasMany(AsignacionTarea::class, 'estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}