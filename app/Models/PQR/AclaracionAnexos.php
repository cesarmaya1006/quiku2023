<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AclaracionAnexos extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'aclaracionanexos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function aclaracion()
    {
        return $this->belongsTo(Aclaracion::class, 'aclaracion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    
}
