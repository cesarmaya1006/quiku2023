<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoPersona extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = "tipo_persona";
    protected $guarded = ['id'];
}
