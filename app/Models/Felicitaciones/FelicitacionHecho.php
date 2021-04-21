<?php

namespace App\Models\Felicitaciones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Felicitaciones\Felicitacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FelicitacionHecho extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'felicitacioneshechos';
    protected $guarded = [];
    
    public function felicitaciones()
    {
        return $this->belongsTo(Felicitacion::class, 'felicitaciones', 'id');
    }
}
