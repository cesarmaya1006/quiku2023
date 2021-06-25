<?php

namespace App\Models\Denuncias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Denuncias\DenunciaAclaracion;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaAclaracionAnexos extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'aclaracionanexos_rep_irre';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function aclaracion()
    {
        return $this->belongsTo(DenunciaAclaracion::class, 'aclaracion_rep_irre_id', 'id');
    }
    //----------------------------------------------------------------------------------
    
}
