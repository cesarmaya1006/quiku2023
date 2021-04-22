<?php

namespace App\Models\SolicitudesDocInfo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoAnexo;

class SolicitudDocInfoPeticion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'solicituddocinfopeticiones';
    protected $guarded = [];
    
    public function solicitud()
    {
        return $this->belongsTo(SolicitudDocInfo::class, 'solicituddocinfo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(SolicitudDocInfoAnexo::class, 'solicituddocinfopeticiones_id', 'id');
    }
}
