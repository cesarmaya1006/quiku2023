<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hecho extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'hechos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(Peticion::class, 'peticion_id', 'id');
    }
    //----------------------------------------------------------------------------------


}
