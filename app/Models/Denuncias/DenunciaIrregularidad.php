<?php

namespace App\Models\Denuncias;

use App\Models\Denuncias\Denuncia;
use App\Models\Empleados\Empleado;
use App\Models\Denuncias\DenunciaAnexo;
use App\Models\Denuncias\DenunciaHecho;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaIrregularidad extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'denunciairregularidades';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function denuncia()
    {
        return $this->belongsTo(Denuncia::class, 'denuncias_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function hechos()
    {
        return $this->hasMany(DenunciaHecho::class, 'denunciairregularidades_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(DenunciaAnexo::class, 'denunciairregularidades_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
