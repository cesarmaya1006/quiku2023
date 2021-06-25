<?php

namespace App\Models\Denuncias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Denuncias\DenunciaIrregularidad;
use App\Models\Denuncias\DenunciaAclaracionAnexos;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaAclaracion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'aclaracion_rep_irre';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(DenunciaIrregularidad::class, 'denunciairregularidades_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function anexos()
    {
        return $this->hasMany(DenunciaAclaracionAnexos::class, 'aclaracion_rep_irre_id', 'id');
    }
    //----------------------------------------------------------------------------------
}