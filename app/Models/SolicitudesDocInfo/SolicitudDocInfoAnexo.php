<?php

namespace App\Models\SolicitudesDocInfo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SolicitudesDocInfo\SolicitudDocInfoPeticion;
use Illuminate\Notifications\Notifiable;

class SolicitudDocInfoAnexo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'solicituddocinfoanexo';
    protected $guarded = [];
    
    public function peticion()
    {
        return $this->belongsTo(SolicitudDocInfoPeticion::class, 'solicituddocinfopeticiones_id', 'id');
    }
}
