<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class tipoPQR extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'tipo_pqr';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function motivos()
    {
        return $this->hasMany(Motivo::class, 'tipo_pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'tipo_pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
