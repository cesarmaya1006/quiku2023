<?php

namespace App\Models\Servicios;

use App\Models\PQR\PQR;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Servicio extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'servicios';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'servicio_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
