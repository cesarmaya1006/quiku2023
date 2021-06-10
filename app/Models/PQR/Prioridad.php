<?php

namespace App\Models\PQR;

use App\Models\ConceptosUOpiniones\ConceptoUOpinion;
use App\Models\Denuncias\Denuncia;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Prioridad extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'prioridades';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'prioridad_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function denuncias()
    {
        return $this->hasMany(Denuncia::class, 'prioridad_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function solicitudesinfodoc()
    {
        return $this->hasMany(SolicitudDocInfo::class, 'prioridad_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function solicitudesdatos()
    {
        return $this->hasMany(SolicitudDatos::class, 'prioridad_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function conceptos()
    {
        return $this->hasMany(ConceptoUOpinion::class, 'prioridad_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
