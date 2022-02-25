<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoAccion extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = "tipo_accion";
    protected $guarded = ['id'];
}
