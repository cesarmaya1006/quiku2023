<?php

namespace App\Models\Admin;

use App\Models\Empleados\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cargo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'cargos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empelados()
    {
        return $this->hasMany(Empleado::class, 'cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
