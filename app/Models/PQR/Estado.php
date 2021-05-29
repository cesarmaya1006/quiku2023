<?php

namespace App\Models\PQR;

use App\Models\ConceptosUOpiniones\ConceptoUOpinion;
use App\Models\Denuncias\Denuncia;
use App\Models\Felicitaciones\Felicitacion;
use App\Models\PQR\PQR;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use App\Models\Sugerencias\Sugerencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'estadospqr';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'estadospqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function conceptos()
    {
        return $this->hasMany(ConceptoUOpinion::class, 'estadospqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function denuncias()
    {
        return $this->hasMany(Denuncia::class, 'estadospqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function felicitaciones()
    {
        return $this->hasMany(Felicitacion::class, 'estadospqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function solcititudDatos()
    {
        return $this->hasMany(SolicitudDatos::class, 'estadospqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function solcititudDocs()
    {
        return $this->hasMany(SolicitudDocInfo::class, 'estadospqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function sugerencias()
    {
        return $this->hasMany(Sugerencia::class, 'estadospqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
