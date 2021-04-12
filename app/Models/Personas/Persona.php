<?php

namespace App\Models\Personas;

use App\Models\Admin\Municipio;
use App\Models\Admin\Usuario;
use App\Models\PQR\PQR;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Persona extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'personas';
    protected $guarded = [];
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
    //----------------------------------------------------------------------------------
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }
}
