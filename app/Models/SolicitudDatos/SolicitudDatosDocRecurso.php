<?php

namespace App\Models\SolicitudDatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudDatos\SolicitudDatosRecurso;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SolicitudDatosDocRecurso extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docrecursos_soli_datos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function recurso()
    {
        return $this->belongsTo(SolicitudDatosRecurso::class, 'recursos_soli_datos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
