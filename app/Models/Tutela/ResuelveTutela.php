<?php

namespace App\Models\Tutela;

use App\Models\PQR\Numeracion;
use App\Models\Empleados\Empleado;
use App\Models\Tutela\AutoAdmisorio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResuelveTutela extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'resuelves_tutela';
    protected $guarded = [];
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
    public function numeracion()
    {
        return $this->belongsTo(Numeracion::class, 'orden', 'id');
    }
    //----------------------------------------------------------------------------------
}