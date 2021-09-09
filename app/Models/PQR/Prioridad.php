<?php

namespace App\Models\PQR;

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
}
