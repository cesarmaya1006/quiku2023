<?php

namespace App\Models\Empresas;

use App\Models\PQR\PQR;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Empresa extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'empresas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function representante()
    {
        return $this->belongsTo(Representante::class, 'empresa_id', 'id');
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
}
