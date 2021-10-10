<?php

namespace App\Models\PQR;

use App\Models\PQR\PQR;
use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resuelve extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'resuelves';
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
    public function numeracion()
    {
        return $this->belongsTo(Numeracion::class, 'orden', 'id');
    }
    //----------------------------------------------------------------------------------
}
