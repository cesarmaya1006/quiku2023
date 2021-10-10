<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Numeracion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'numeracionordinal';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function numeracion()
    {
        return $this->belongsTo(Resuelve::class, 'orden', 'id');
    }
}
