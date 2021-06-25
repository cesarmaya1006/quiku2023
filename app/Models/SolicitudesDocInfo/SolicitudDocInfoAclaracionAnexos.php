<?php

namespace App\Models\SolicitudesDocInfo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoAclaracion;

class SolicitudDocInfoAclaracionAnexos extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'aclaracionanexos_soli_info';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function aclaracion()
    {
        return $this->belongsTo(SolicitudDocInfoAclaracion::class, 'aclaracion_soli_info_id', 'id');
    }
    //----------------------------------------------------------------------------------
    
}
