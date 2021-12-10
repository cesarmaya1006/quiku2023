<?php

namespace App\Models\PQR;

use App\Models\Tutela\AutoAdmisorio;
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
    public function tutelas()
    {
        return $this->hasMany(AutoAdmisorio::class, 'prioridad_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
