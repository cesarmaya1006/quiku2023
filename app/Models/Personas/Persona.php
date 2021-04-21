<?php

namespace App\Models\Personas;

use App\Models\Admin\Municipio;
use App\Models\Admin\Pais;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Usuario;
use App\Models\PQR\PQR;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use App\Models\Sugerencias\Sugerencia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Persona extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'personas';
    protected $guarded = [];

    public function tipos_docu()
    {
        return $this->belongsTo(Tipo_Docu::class, 'docutipos_id', 'id');
    }
    //==================================================================================
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id');
    }
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function sugerencias()
    {
        return $this->hasMany(Sugerencia::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function solicitudDocInfo()
    {
        return $this->hasMany(SolicitudDocInfo::class, 'persona_id', 'id');
    }
}
