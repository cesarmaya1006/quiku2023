<?php

namespace App\Models\Empresas;

use App\Models\PQR\PQR;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'empresas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function representante()
    {
        return $this->belongsTo(Representante::class, 'representante_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'empresa_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function sugerencias()
    {
        return $this->hasMany(Sugerencia::class, 'empresa_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function solicitudDocInfo()
    {
        return $this->hasMany(SolicitudDocInfo::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->hasMany(Empleado::class, 'empresa_id', 'id');
    }
}
